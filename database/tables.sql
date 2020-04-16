DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS bodyPart;
DROP TABLE IF EXISTS difficulty;
DROP TABLE IF EXISTS users;


CREATE TABLE bodyPart
(
    id   tinyint PRIMARY KEY AUTO_INCREMENT,
    part varchar(20) NOT NULL
);

CREATE TABLE difficulty
(
    id    tinyint PRIMARY KEY AUTO_INCREMENT,
    level varchar(12) NOT NULL
);

CREATE TABLE users
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    admin        boolean,
    username     varchar(225) NOT NULL,
    email        varchar(225) NOT NULL,
    password     varchar(255) NOT NULL, # 255 because the hashing requires 255 min
    photo        blob,
    created_at   datetime,
    updated_at   datetime,
    first_name   varchar(20)  NOT NULL,
    user_content varchar(225) NOT NULL
);

CREATE TABLE posts
(
    id            int PRIMARY KEY AUTO_INCREMENT,
    user_id       int          NOT NULL,
    exercise_name varchar(225) NOT NULL,
    body_part_id  tinyint      NOT NULL,
    difficulty_id tinyint      NOT NULL,
    description   text(1000)   NOT NULL,
    posted_at     datetime,
    photo         blob,
    created_at datetime,
    CONSTRAINT `fk_posts_user` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT `fk_posts_bodyPart` FOREIGN KEY (body_part_id) REFERENCES bodyPart (id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT `fk_posts_difficulty` FOREIGN KEY (difficulty_id) REFERENCES difficulty (id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE table comments
(
    id        INT PRIMARY KEY AUTO_INCREMENT,
    blog_id   INT       NOT NULL,
    posted_at datetime,
    content   text(300) NOT NULL,
    CONSTRAINT `fk_comments` FOREIGN KEY (blog_id) REFERENCES posts (id) ON UPDATE CASCADE ON DELETE RESTRICT

);
