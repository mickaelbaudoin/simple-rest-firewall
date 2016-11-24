# simple-rest-firewall
firewall with api REST

## Create entities and services

Entities : IUser, IGroup and IAcl .

### MCD

![alt text](https://github.com/mickaelbaudoin/simple-rest-firewall/blob/master/src/doc/img/mcd.jpg "MCD")

### SQL (Mysql)
---------------------------------
CREATE TABLE user ( 
   user_id INT(11) NOT NULL AUTO_INCREMENT,
   user_login VARCHAR(255) NOT NULL,
   user_token VARCHAR(255) DEFAULT NULL,
   user_token_date_expired DATETIME DEFAULT NULL,
   user_password VARCHAR(255) NOT NULL,
   user_salt VARCHAR(255) NOT NULL,
  PRIMARY KEY (user_id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE group (
  group_id INT(11) NOT NULL AUTO_INCREMENT,
  group_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (group_id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE user_group (
  user_user_id INT(11) NOT NULL,
  group_group_id INT(11) NOT NULL,
  PRIMARY KEY (user_user_id, group_group_id),
  INDEX fk_user_has_group_group1_idx (group_group_id ASC),
  INDEX fk_user_has_group_user1_idx (user_user_id ASC),
  CONSTRAINT fk_user_has_group_user1
    FOREIGN KEY (user_user_id)
    REFERENCES user (user_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_user_has_group_group1
    FOREIGN KEY (group_group_id)
    REFERENCES group (group_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE acl (
  acl_permissions VARCHAR(10) NOT NULL,
  acl_resource_name VARCHAR(100) NOT NULL,
  user_user_id INT(11) NOT NULL,
  group_group_id INT(11) NOT NULL,
  INDEX fk_acl_user1_idx (user_user_id ASC),
  INDEX fk_acl_group1_idx (group_group_id ASC),
  CONSTRAINT fk_acl_user1
    FOREIGN KEY (user_user_id)
    REFERENCES user (user_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_acl_group1
    FOREIGN KEY (group_group_id)
    REFERENCES group (group_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

----------------------------------------------------
