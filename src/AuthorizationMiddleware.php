<?php

namespace SimpleRestFirewall;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Description of RestAuthorization
 *
 * @author mickael
 */
class AuthorizationMiddleware {
    
    /**
     * @var IUser
     */
    private $user = null;
    
    private $ignorePath = array();
    
    private $router;
    
    /**
     * @var IAclService
     */
    private $aclService = null;
    
    public function __construct(IUser $user, IAclService $aclService, \SimpleRestFirewall\IRouter $router) {
        $this->user = $user;
        $this->aclService = $aclService;
        $this->router = $router;
    }
    
    public function addIgnorePath($path){
        array_push($this->ignorePath, $path);
    }
    
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next){
        if(!$this->ignoringPath($request)){
            
            if($this->isAuthorized($request)){
                return $next($request,$response);
            //Retourne statut 403
            }else{
                $response = $response->withStatus(403);
                $result = array('message' => 'forbidden');
                $response->getBody()->write(json_encode($result));
                return $response->withHeader('Content-Type', 'application/json');
            }
            
            $response = $response->withStatus(401);
            $response->withHeader('Content-Type', 'application/json');
            $result = array('message' => 'unauthorized');
            $response->getBody()->write(json_encode($result));
            return $response;
            
        }
        
        return $next($request,$response);
    }
    
    protected function ignoringPath(ServerRequestInterface $request){
        $path = $request->getUri()->getPath();
        
        foreach($this->ignorePath as $ignorePath){
            if(preg_match("/$ignorePath/", $path)){
                return true;
            }
        }
        
        return false;
        
    }
    
    /**
     * Vérifi les accès a une ressource
     * 
     * Le système de permission est basé sur celui de linux
     * 
     * Les permissions possible sont 6 , 2 et 0 (ALL/READ/DENY)
     * Les permissions respecte une syntaxe et un ordre précis 6,2,0 (Proprietaire,Groupe,Autre)
     * 
     * Chaque method http correspond a une permission requise (MappingPermission)
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return boolean
     */
    protected function isAuthorized(ServerRequestInterface $request){
        $routeName = $this->router->getRouteName($request->getUri());
        if($routeName != null){
            
            $acl = $this->aclService->findAclByResourceName($routeName);
            if($acl == null){
                return false;
            }
            
            $permissions = explode(',',$acl->getPermissions());
            $method = $request->getMethod();
            //On vérifit si tout le monde a les droits
            if($permissions[2] == MappingPermission::ALL){
                return true;
            }

            //On vérifit si l'émetteur de la requete est le prorietaire de cette ressource
            if($acl->getOwnerUser()->getUserId() == $this->user->getUserId()){
                //On vérifit les droit du proprietaire
                if(MappingPermission::getPermissionRequiredByMethod($method) <= $permissions[0]){
                    return true;
                }
            }

            //On vérifit si le groupe de l'utilisateur a les droit
            foreach($this->user->getGroups() as $group){
                if($group->getGroupId() == $acl->getGroup()->getGroupId()){
                    //On vérifit les droit du groupe
                    if(MappingPermission::getPermissionRequiredByMethod($method) <= $permissions[1]){
                        return true;
                    }
                }
            }
        }
        
        return false;
    }
}
