DELETE FROM comments;
DELETE FROM posts;
DELETE FROM bodyPart;
DELETE FROM difficulty;
DELETE FROM users;


INSERT INTO bodyPart(id, part) VALUES (1,'arms');
INSERT INTO bodyPart(id, part) VALUES (2,'chest');
INSERT INTO bodyPart(id, part) VALUES (3,'abs');
INSERT INTO bodyPart(id, part) VALUES (4,'legs');


 INSERT INTO users VALUES(1, true, 'Manda1', 'amanda.r.merrifield@gmail.com', 'password1', LOAD_FILE('views/images/logo.png'), NOW(),NOW(), 'Amanda',
  "Amanda is an outdoor exercise enthusiast, and loves to take long hikes, rock climb and swim in the ocean. However her preferred indoor exercise is yoga and weight training.");

 INSERT INTO users VALUES(2, true, 'Vani2', 'mayavanimudgal@gmail.com', 'password2', LOAD_FILE('views/images/logo.png'), NOW(),NOW(), 'Maya-Vani',
 "Maya-Vani is a certified lifeguard and has been a competitive swimmer for several years. She also enjoys practising and teaching martial arts, as she hopes to open her own women's self defence classes in the future");

 INSERT INTO users VALUES(3, true, 'Zita3', 'buzasizita@gmail.com', '$2y$10$vnowDo8U4rKhS1QWXqJwHutURfKmdfXzaOeHAqIw56QNbvbQhN1fW', LOAD_FILE('views/images/logo.png'), NOW(),NOW(), 'Zita',
  "Zita believes you don't have to be a professional athlete to incorporate sport into your everyday routine. She believes our exercises are perfect for beginners to complete and enjoy the guaranteed benefits.");
 
INSERT INTO users VALUES(4, true, 'Afro4', 'afrodytapudlo@hotmail.com', 'password4', LOAD_FILE('views/images/logo.png'), NOW(),NOW(), 'Afrodyta',
 "Afrodyta is extremely enthusiastic about exercise and the benefits it can have on your mental, social and physical wellbeing. This blog has allowed
  her to share her passion for keeping fit, with others.");




INSERT INTO difficulty VALUES (1,'beginner');
INSERT INTO difficulty VALUES (2,'intermediate');
INSERT INTO difficulty VALUES (3,'advanced');


INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, created_at)
    VALUES (1,1,'running',4, 1, 'Run around the block 3 times', NOW());
INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, created_at)
VALUES (2,1,'resistance band',4, 1, 'Step 1:
Starting Position: Assume a seated position, extending one leg out in front. Secure a cable or resistance band around the ball of that foot. The resistance should be pulling the bottom of your foot away from you.
Step 2:
    Start with your foot in plantar flexion (toes pointed forward away from your body) and slowly dorsiflex the ankle (pulling your toes towards your shin). Slowly return to your starting position, controlling the speed of movement and repeat.
Step 3:
    The movement comes from your ankle, so avoid any bending or full extension of your knee throughout the movement. Always aim to keep your foot aligned facing forward. Step 4 As an exercise progression, modify your movement to include a slight foot rotation as you dorsiflex the ankle (toes point towards the ceiling). The direction of your slight rotation should be into inversion (bringing the big toe towards your shin bone). Attempt to sit upright and avoid any excessive arching or slouching in the low back.',
        NOW());

INSERT INTO comments VALUES (1,1,NOW(),'This is an amazing exercise!');









 



