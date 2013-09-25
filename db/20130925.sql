UPDATE  `engrclubs`.`clubs` SET  `website` =  'http://www.asceucla.com/',
`contact` =  'uclaasce@gmail.com',
`how_to_join` =  '<p>
                    Join us at our ASCE Open House, Wednesday of Second Week in Boelter Penthouse at 6pm or email 
                    <a href=''mailto:brooke.m.crowe@gmail.com''>Brooke Crowe</a>.

                </p>' WHERE  `clubs`.`id` =2;

UPDATE  `engrclubs`.`clubs` SET  `how_to_join` =  'Attend our training sessions and general meetings. General Meetings are Fridays at 5pm in Boelter 2730B.' WHERE  `clubs`.`id` =31;

UPDATE `engrclubs`.`clubs` SET `how_to_join` =  'Come to any of our Infosessions and fill out a short application to join! You can email us at iteucla@gmail.com for more information.',
    `upcoming_events` = '<ul>
<li>LAX Airfield Field Trip</li>
<li>405 Construction Site Visit</li> 
</ul>'
 WHERE `clubs`.`id`= 23;

UPDATE `engrclubs`.`clubs` SET `logo_path` = 'assets/img/tt.jpg' WHERE `clubs`.`id` = 13;

UPDATE  `engrclubs`.`clubs` SET  `logo_path` =  'assets/img/esuc.png' WHERE  `clubs`.`id` =37;

UPDATE  `engrclubs`.`clubs` SET  `logo_path` =  'assets/img/baja.png' WHERE  `clubs`.`id` =31;