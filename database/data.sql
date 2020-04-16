DELETE FROM comments;
DELETE FROM posts;
DELETE FROM bodyPart;
DELETE FROM difficulty;
DELETE FROM users;


INSERT INTO bodyPart(id, part) VALUES (1,'arms');
INSERT INTO bodyPart(id, part) VALUES (2,'chest');
INSERT INTO bodyPart(id, part) VALUES (3,'abs');
INSERT INTO bodyPart(id, part) VALUES (4,'legs');

INSERT INTO users VALUES(1, false, 'Manda1', 'amanda.r.merrifield@gmail.com', 'password1', LOAD_FILE('/Applications/XAMPP/htdocs/FittnessBlog/views/images/hiking.jpg'), NOW(),NOW(), 'Amanda',
 "Amanda is an outdoor exercise enthusiast, and loves to take long hikes, rock climb and swim in the ocean. However her preferred indoor exercise is yoga and weight training.");

INSERT INTO users VALUES(1, false, 'Vani2', 'amanda.r.merrifield@gmail.com', 'password2', LOAD_FILE('/Applications/XAMPP/htdocs/FittnessBlog/views/images/lifeguard.png'), NOW(),NOW(), 'Maya-Vani',
  "Maya-Vani is a certified lifeguard and has been a competitive swimmer for several years. She also enjoys practising and teaching martial arts, as she hopes to open her own women's self defence classes in the future");

INSERT INTO users VALUES(1, false, 'Zita3', 'buzasizita@gmail.com', 'password3', LOAD_FILE('/Applications/XAMPP/htdocs/FittnessBlog/views/images/situp.jpg'), NOW(),NOW(), 'Zita',
  "Zita believes you don't have to be a professional athlete to incorporate sport into your everyday routine. She believes our exercises are perfect for beginners to complete and enjoy the guaranteed benefits.");

INSERT INTO users VALUES(1, false, 'Afro4', 'afrodytapudlo@hotmail.com', 'password4', LOAD_FILE('/Applications/XAMPP/htdocs/FittnessBlog/views/images/runningcharity.jpg'), NOW(),NOW(), 'Afrodyta',
 "Afrodyta is extremely enthusiastic about exercise and the benefits it can have on your mental, social and physical wellbeing. This blog has allowed
 her to share her passion for keeping fit, with others.");
INSERT INTO users VALUES (1,false,'hanna99','hanna@gmail.com','password',LOAD_FILE('d:\\flower.gif'),NOW(), NOW(),'Hannah','Hi I am Hannah');
INSERT INTO users VALUES (2, true, 'admin', 'admin@google.com', 'password', LOAD_FILE('/Users/zita/Desktop/FibonacciDualSpiral.png'), DATE('2020-2-20'),NOW(), 'Admin','Hi I am the admin');

INSERT INTO difficulty VALUES (1,'beginner');
INSERT INTO difficulty VALUES (2,'intermediate');
INSERT INTO difficulty VALUES (3,'advanced');


INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description)
    VALUES (1,1,'running',4, 1, 'Run around the block 3 times');

INSERT INTO comments VALUES (1,1,NOW(),'This is an amazing exercise!');








 



