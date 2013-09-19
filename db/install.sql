-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2013 at 10:40 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `engrclubs`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `logo_path` text NOT NULL,
  `website` text NOT NULL,
  `contact` text NOT NULL,
  `president` text NOT NULL,
  `year_founded` text NOT NULL,
  `about` text NOT NULL,
  `how_to_join` text NOT NULL,
  `upcoming_events` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `logo_path`, `website`, `contact`, `president`, `year_founded`, `about`, `how_to_join`, `upcoming_events`) VALUES
(1, 'Tau Beta Pi (TBP)', 'assets/img/tbp.png', 'http://tbp.seas.ucla.edu/', 'taubetapi@seas.ucla.edu', 'Grace Kim', '1952', '<p>\n                   Tau Beta Pi, the National Engineering Honor Society, recognizes students of all majors \n                    who exhibit distinguished scholarship and exemplary character. UCLA&#39;s CA Epsilon Chapter \n                    was founded in 1952. Since then, it has since become an integral part of the UCLA''s student\n                    organizations and the Engineering community. Tau Beta Pi organizes events on and off campus \n                    for mentorship, professional development, community service, and fun!\n                </p>\n                <p>\n                    Some of the most notable Tau Beta Pi events are the <b>free drop in tutoring service</b> and the \n                    <b>Internship Insider Night</b>. The free drop in tutoring service is held in Boelter Hall 6266, \n                    where upperclassmen volunteer their time to help with any lower division math and science \n                    courses. This service is open to all students on the UCLA campus. Please visit \n                    <a href=''http://tbp.seas.ucla.edu/tutoring''>the tutoring page</a>\n                    for the schedule of tutors and subjects at the end of Week 2. Another upcoming event is the \n                    Internship Insider Night, which will be held on October 8th (Tuesday of Week 3). A panel of \n                    upperclassmen will speak about their internship experiences, give you tips about the job hunt, \n                    and answer any questions you may have about the process. In addition to these events, Tau Beta Pi \n                    hosts a variety of competitions throughout the year to encourage creativity and teamwork, such as \n                    the Rube Goldberg Competition hosted in Winter Quarter. Details about the competition and how to \n                    sign up can be found on the chapter website.\n                </p>', '<p>\r\n                    To be eligible for initiation into Tau Beta Pi, you must be in the top fifth of your senior class, \r\n                    or top eighth of the junior class (by units). However, the vast majority of our events and competitions \r\n                    are open to all students!\r\n                </p>', '<ul>\r\n                    <li>Internship Insider Night - October 8th, Tuesday of 3rd Week</li>\r\n                    <li>Hack The West (cohosted with UPE) - October 18th - 20th</li>\r\n                </ul>'),
(2, 'American Society of Civil Engineers (ASCE)', 'assets/img/asce.jpg', 'http://www.ascebruins.org/main/', 'asce@seas.ucla.edu', 'Brooke Crowe', '1959', '<p>\r\n                    The American Society of Civil Engineers is a international association dedicated to the \r\n                    professional, academic, and personal growth of Civil Engineers.  UCLA''s student chapter \r\n                    is the best way to make the most of your Civil experience, with Nationally-winning projects, \r\n                    close industry and faculty ties, and social events throughout the quarter. Our projects, \r\n                    including Concrete Canoe, Seismic Design, Geotechnical Design, Steel Bridge, Environmental Design, \r\n                    Surveying, and Concrete Sports, allow students of all years and skill levels to practice the material \r\n                    presented in the classroom. To learn more about ASCE and everything we have to offer, please visit \r\n                    ASCE Open House on Wednesday of Second Week, more information will be available on our website \r\n                    during Fall.  Other professional and industry events include the ASCE Fall Career Fair, Graduate \r\n                    Panel, Internship Panel, ASCE Winter Career Fair, and Infosessions.  Other events include our \r\n                    annual Big Bear Ski Trip, Regional Conferences, National Conferences, Socials, and \r\n                    Student-Professor BBQs.  More information will be available on our website and Facebook page.\r\n                </p>', '<p>\r\n                    Join us at our ASCE Open House, Wednesday of Second Week in Boelter Penthouse at 6pm or email \r\n                    <a href=''mailto:manickam.vivek.k@gmail.com''>Vivek Manickam</a>.\r\n\r\n                </p>', '<ul>\r\n                    <li>ASCE Open House - Wednesday of 3rd Week</li>\r\n                    <li>ASCE Fall Career Fair - November 5th</li>\r\n                </ul>'),
(3, 'Biomedical Engineering Society (BMES)', 'assets/img/bmes.png', 'http://bmes.seas.ucla.edu/', 'bmesucla@gmail.com', 'David Li', '1999', '<p>\r\n                    The UCLA Biomedical Engineering Society was established to provide a forum for student discussion and collaboration, \r\n                    to promote academic and professional development of its members, and to improve social bonds between fellow students \r\n                    within the community of the UCLA Bioengineering Department. BMES hosts career and industry information sessions, academic \r\n                    tutoring, and community development events to provide members with opportunities to meet and network with professors, \r\n                    industry representatives, and fellow students. Additionally, many mentorship and social events are held throughout the year.\r\n                </p>\r\n                <p>\r\n                    Membership is not restricted to undergraduate/graduate students in the Bioengineering Department. We actively encourage \r\n                    all majors who have an interest in Bioengineering to be a part of the Society.\r\n                </p>', '<p>\r\n                    All that’s necessary for access to an entire year of events are a completed membership form and $5.\r\n                </p>', '<ul>\r\n                    <li>General Meeting &#8722 Week 1</li>\r\n                    <li>Fall BBQ &#8722 Week 1/2</li>\r\n                    <li>Mentorship Dinner &#8722 Week 4</li>\r\n                    <li>Industry Info Sessions &#8722 Weeks 5 & 8</li>\r\n                    <li>Class Planning Workshop &#8722 Week 6</li>\r\n                    <li>Getting into Research &#8722 Week 7</li>\r\n                    <li>Holiday Party &#8722 Week 9</li>\r\n                </ul>'),
(4, 'ELFIN CubeSat Project', 'assets/img/elfin.png', '', 'chrisshaffer@ucla.edu', 'Chris Shaffer', '', '\n                            <p>The Electron Losses and Fields Investigation (ELFIN) is a \n                            3U CubeSatellite under development by the Earth and Space Sciences \n                            department at UCLA. The spacecraft carries a number of scientific \n                            instruments on-board to explore the loss of relativistic electrons \n                            from the Earthâ€™s radiation belts.</p>\n                            <p>ELFIN is a participant in the Air Force Research Laboratoryâ€™s \n                            University Nanosatellite Program and represents UCLAâ€™s first largely \n                            student-designed and built satellite. The ELFIN team is a tightly-knit \n                            group of approximately 35 undergraduates as well as a number of staff \n                            scientists and engineers. This project gives students hands-on experience \n                            from initial concept design to final satellite assembly and, of course, \n                            launch!</p>\n                            ', '\n                            <p>Interested applicants may submit their contact information, \n                            resume, and a brief paragraph about themselves to elfin@igpp.ucla.edu. \n                            Students from all relevant disciplines are welcome to apply.</p>\n                            \n                            <p> For additional information, contact:<br>\n                            Chris Shaffer<br>\n                            chrisshaffer@ucla.edu<br>\n                            ELFIN Project Manager</p>\n                            ', ''),
(5, 'UCLA Rocket Project', '', '', 'uclarocketproject@gmail.com', '', '', '\n                            <p>The UCLA Rocket Project is a team dedicated to providing engagement in the aerospace engineering field through the design and manufacture of rockets. The team welcomes members of any major, as anyone with an interest in aerospace can help the team.</p>\n        	<p>Every year, the team builds a rocket for the Intercollegiate Rocket Engineering Competition, which is held in Utah at the end of the school year.  The team participates in a competition with a goal of sending a 10 lb payload to 25,000 ft.</p>\n                            ', '\n                            <p>Anyone with an interest in rocketry or aerospace is welcome to join.  You can join either by emailing the team or coming to the AIAA Kickoff Meeting (which will provide more information on the team and AIAA).</p>\n                            ', ''),
(6, 'Building Engineers and Mentors (BEAM)', '', 'beam.ucla.edu', 'uclabeam@ucla.edu', '', '', '\n                            <p>Building Engineers and Mentors (BEAM) at UCLA is a science and engineering outreach program that brings hands-on STEM activities to underserved K-8 schools in Los Angeles. BEAM was originally founded at UC Berkeley in 2008, and a sister chapter was created at UCLA in 2010.</p>\n<p>Each week, our passionate and dedicated group of BEAM mentors attend a student-taught class to learn how to teach a hands-on activity. Mentors then teach the hands-on activity to 2nd-8th graders at three schools across LA. Mentors also have the opportunity to write original lesson plans for hands-on activities. BEAM mentors volunteer weekly at a school in the greater Los Angeles area (transportation is provided). By participating in BEAM, mentors make a difference in their community, learn to become effective science communicators, and can even receive two units of course credit. We welcome undergrad and graduate students of all majors!</p>\n\n                            ', '\n                            <p>Please check our website for our infosession in fall quarter! </p>\n                            ', ''),
(7, 'Materials Research Society (MRS)', '', 'www.facebook.com/mrsucla', 'materialsresearchbruins@gmail.com', 'Tait McLouth', '', '\n                            <p>The Materials Research Society is a national organization centered on the newest and most innovative research being done today in the field of materials.  Here at UCLA, the student chapter focuses on exposing undergraduates to research opportunities available to them, as well as helping connect them to the professors of the department and their many networking connections.  The MRS organizes alumni panels, socials, BBQs, and info sessions for its members, and is a great way to get to know everyone in the department. MRS utilizes the small size of the Materials Science and Engineering department to its advantage; almost all of the upperclassmen know what each professor is researching, and how to land a position in their group.  Undergraduate research is highly encouraged in the department, as it is a great way to boost your resume and gain experience.  Any undergraduates interested in materials research, or just looking for more information on the major are welcome to come find out more at our meetings and events!</p>\n                            ', '\n                             <p>Anyone interested in materials research can join!  Although the club is mainly composed of Materials scientists/engineers, all disciplines are welcome.</p>', ''),
(8, 'International Society For Pharmaceutical Engineering (ISPE)', '', 'http://www.ispeucla.com/', 'ucla.ispe@gmail.com', 'Tait McLouth', '', '\n                            <p>The UCLA student chapter of the International Society for Pharmaceutical Engineering ISPE is the premiere organization for students interested in biotechnology and pharmaceutical science. We are a smaller branch of the larger National Chapter of ISPE, which is the world''s largest not-for-profit association serving its Members by leading scientific, technical and regulatory advancement throughout the entire pharmaceutical industry. UCLA ISPE is here to assist in your professional aspirations. Whether you are an undergraduate or graduate student, or a postdoctoral researcher, we provide valuable opportunities to network and interact with relevant academic and industry professionals, as well as other students in the UCLA ISPE community. We welcome anybody interested in the biotechnology, biomedical, and pharmaceutical fields. All majors are welcome! Among the most common majors in our organization include Chemical Engineering, Bioengineering, Biochemistry, MCBD, and MIMG. Our students aspire to become leaders in industry, healthcare, and academia. ISPE continually fosters strong connections with the UCLA School of Engineering, UCLA Anderson School of Management, UCLA Career Center, and numerous healthcare and life science companies (including Amgen, Baxter, Teva Pharmaceuticals, Medtronic, Genentech, etc.) We are sponsored by the Department of Bioengineering and our faculty advisors are Professors Timothy Deming, PhD, and Bill Tawil, PhD, MBA.</p>', '\n                             <p>Sign up at our Website (below) and come to any of our events to fill out a membership form and receive your annual membership card.</p>', '<ul>\n<li>Baxter Plant Tours â€“ Year round</li>\n<li>Genentech/PSC Biotech/Amgen/Medtronic Infosessions â€“ Throughout the year</li>\n<li>Teva Pharmaceuticals Infosession â€“ Winter Quarter</li>\n<li>Undergrad Research Fair â€“ Spring Quarter</li>\n<li>Biotech Career Fair â€“ Spring Quarter</li>\n</ul>'),
(9, 'National Society of Black Engineers (NSBE)', '', 'https://sites.google.com/site/uclansbe/', 'nsbe.bruins@gmail.com', 'Chris Miller', '1980', '\n                            <p>The National Society of Black Engineers (NSBE) is a non-profit association that is one of the largest student-managed organizations in the country with over 30,000 members nationwide.  The NSBE mission is â€œto increase the number of culturally responsible Black Engineers who excel academically, succeed professionally, and positively impact the community.â€  NSBE provides opportunities for academic assistance and professional development, through tutoring and study groups while also sponsoring ongoing activities such as company tours, professional workshops, acquiring guest speakers, and having industry panels. NSBE partners up with two other organizations, the Society of Latino Engineers and Scientists (SOLES) and the American Indian Science and Engineers and Society (AISES) to form a Tri-Org.  Together and separately, we hold many outreach events on and off campus, as well as hold several fun social events such as movie nights, gender nights, engineering in training day, women in science and engineering day, basketball tournaments, alumni bowling, and various food sales. </p>', '\n                             <p>Anybody and everybody is welcome to join NSBE.  Anyone is welcome to attend any of our bi-weekly meetings every other Tuesday, with our first meeting being October 1, 2013 in Boelter Hall room 6270 at 6:00 pm.  Food and drinks are always provided and you will get a chance to meet all of our membership while having a good time.</p>', '<ul>\n<li>Fall Quarter: Krispy Kreme Donut Sale (Week 3)</li>\n<li>Winter Quarter: NSBE Basketball Tournament (Weekend of 3rd Week)</li>\n<li>Spring Quarter: Women in Science and Engineering Day (Friday of 7th Week)</li>\n</ul>'),
(10, 'Upsilon Pi Epsilon (UPE)', '', 'https://upe.seas.ucla.edu/', 'info@upe.seas.ucla.edu', 'Preston Chan', '2005', '\n                             <p>Upsilon Pi Epsilon (UPE) is the first and only existing international honor society in the Computing and Information Disciplines. The overall mission of UPE is to recognize academic excellence at both the undergraduate and graduate levels and to maximize the personal and professional growth of its members.</p>\n<p>UCLA''s UPE CA Beta Chapter has been an important part of the CS community at UCLA since its refounding in 2005. UPE holds a variety of CS focused events throughout the year for the benefit of our peers. Tech talks and infosessions from industry leaders provide opportunities for students to connect with companies and obtain research and employment. Mentorship and tutoring foster the exchange of knowledge and wisdom between experienced students and those who are just starting out. This year, UPE will also offer workshops guiding students through the full-time/internship recruitment process specific to Software Engineering jobs. To find out more, please visit the UPE website.</p>', '\n                             <p>To be eligible you must be majoring in Computer Science, Computer Science and Engineering, or Electrical Engineering with an emphasis in Computer Science, have a 3.5+ GPA, be in the top 1/3 of your class, and have Junior/Senior standing (90+ units).</p>', '<ul>\n<li>CS Department Picnic around 5th week</li>\n<li>Information sessions from the hottest tech companies on most weeks</li>\n</ul>'),
(12, 'UCLA Combat Robotics', '', 'http://asme.seas.ucla.edu/', 'asme.battlebots@seas.ucla.edu', 'Brian Downey', '1967', '\n                             <p>The UCLA Combat Robotics team is the primary project of the American Society of Mechanical Engineers (ASME) student section at UCLA.  The club provides a forum for students to gain hands-on experience and to apply the concepts taught in class to real-life scenarios.  Students conceptualize, write proposals, design, manufacture and test arena-combat robots to compete against other collegiate and professional teams in bi-annual international competitions.  During this process, students gain experience using techniques, tools and programs commonly used in industry and other engineering professions.  Examples include Computer-Aided Design and Finite Element Analysis programs such as SolidWorks or Abaqus, and industrial machining tools such as the mill and lathe.  Our mission is to teach students how to fabricate and optimize a personal design to create a professional product that can compete at an international level, as well as provide students with the skills and experience to set them apart when entering the workforce. UCLA Combat Robotics has created many different bots ranging from DrumBots, Shell Spinners and ThwakBots, to Wedges, HockeyBots and Lifters, and has competed in weight divisions ranging from 1 lb to 120 lbs. The Combat Robotics team is composed primarily of mechanical and electrical undergraduate engineering students, however, all majors are welcome to join! No previous experience is required.</p>', '\n                             <p>Come check out our robots on Engineering welcome day and get your name on our recruitment mailing list! If you cannot make this, please send an email to asme.membership@seas.ucla.edu with your name and email address. Any general questions please send to asme.battebots@seas.ucla.edu.</p> ', 'Kick off meeting during 1st week plus many other fun and exciting events in the fall and throughout the year! The date of the first meeting will be sent to you once you get on our mailing list.'),
(13, 'Theta Tau (TT)', '', 'http://thetataubruins.org/', 'ucla.thetatau@gmail.com', 'Alan Bui, Byron Pang', '2013', '\n                             <p>Theta Tau is a co-ed professional engineering fraternity seeking to excel in professionalism, brotherhood, and service. Our brothers are passionate and motivated engineers dedicated to their brothers and their fraternity. Every quarter, Theta Tau Colony at UCLA hosts many events that promote professional growth, brotherhood among its members, as well as service to the community. Through these events, we strive to become one body that share many unforgettable memories throughout our time at UCLA.</p>', '\n                             <p>We will be having recruitment at the beginning of Fall and Spring quarters where those interested in joining can learn more about who we are and meet the brothers. This is a time for us to get to know those who are interested also. Bids will be given out at the end of recruitment, and those that accept will go through a pledge process to become official members.</p>', 'Come out to Rush during First Week!'),
(14, 'Triangle Fraternity', '', 'http://www.trianglebruins.com/', ' ivp@trianglebruins.com', 'Dennis Rooney', '1957', '\n                             <p>Triangle''s purpose is to develop balanced men in the fields of Engineering, Architecture, and Science by providing an environment which fosters personal growth and professional success. We are very proud of our house on Landfair Ave. Members are encouraged to use their engineering knowledge to improve their rooms and public areas with house funded projects. Living with other engineering students provides fantastic scholastic help, and the vast alumni network makes finding internships and jobs easier. While academics are our main focus, we understand the importance of a healthy social lifestyle. Triangle offers a variety of social functions ranging from dinner exchanges to parties to brotherhood events.</p>', '', '<ul>\n                <li>Thanksgiving Dinner - Tuesday of Thanksgiving Week</li>\n<li>Founder''s Day Dinner - Second or Third Friday of April</li>\n<li>Quarterly Retreats - Past locations have included Big Bear, Joshua Tree and more.</li> </ul>'),
(15, 'American Institute of Chemical Engineers (AIChE)', '', 'http://www.seas.ucla.edu/aiche/', 'aiche@ucla.edu', 'Dennis Rooney', '1957', '\n                             AIChE at UCLA is a professional organization for chemical engineers at UCLA. We focus on professional mentorship, industry and peer networking, and career development workshops and activities. The goal of our organization is to help students discover opportunities for chemical engineers and to help students prepare for careers in industry or academia.', 'Attend any AIChE at UCLA event and ask an officer about membership. Also be sure to sign up with the national organization at www.aiche.org/community/membership', '<ul>\n                <li>The AIChE at UCLA Annual Career Fair â€“ Wednesday, October 16th (3rd Week)</li>\n<li>Internship Insider Night â€“ Tuesday, October 8th (2nd Week)</li>\n<li>Fall company information sessions â€“ Various dates</li> \n<li>Dinner with a Professor</li>\n<li>Various plant tours â€“ previous tours have included breweries, refineries, pharmaceutical manufacturing sites, and dietary supplement manufacturing sites.</li>\n<li>Yankee Doodles â€“ Annual alumni networking event</li>\n<li>Mock interviews, resume workshops, Industry career panel</li>\n</ul>'),
(16, 'Technical Entrepreneurial Community (TEC)', '', 'http://www.tecbruins.org/', 'norris.tie@tecbruins.org', 'Norris Tie', '2009', '\n                             The Technical Entrepreneurial Community (TEC) serves as the Engineering School''s outlet for students to be creative, innovative, and entrepreneurial. TEC hosts workshops to connect students to other entrepreneurial-minded students internal and external to the Engineering School (i.e. MBA students, life sciences, etc.) and speakers to share their experiences and provide advice/mentorship to aspiring entrepreneurs. We form a support network to keep college aspirations alive and offer resources that can help turn them into realities. We have venture capitalist partners to help you perfect your pitch, lawyers who lend you their legal advice, and peers to help build your start-up. We are not only a community of engineers, but a community of daring dreamers, persistent go-getters, and strategic risk-takers!', 'We will be recruiting new team members in October! Feel free to send your resumes to hr@tecbruins.org with [TEC Application] as the subject matter.', ''),
(17, 'UCLA IEEE', '', 'www.ieee.ucla.edu', 'general@ieee.ucla.edu', 'Jingtao Xia', '1964', '\n                             UCLA IEEE (Institute of Electrical and Electronics Engineers) is one of the largest engineering clubs on campus! In addition to our corporate infosessions, workshops, and events, we are known for our challenging but fun projects that teach you hands-on EE skills you donâ€™t necessarily learn in class. OPS is catered to first and second-years, C3 to computer science nerds, and Micromouse and Natcar to those who want a more challenging robotics experience. We also sponsor independent projects and have a project match-making service to match people who have a project idea and want help to people who donâ€™t have an idea but want to do something interesting.Stop by and take a tour of our sweet lab on the second floor of Boelter Hall. We have a 3D printer and PCB mill that anyone can use for a small cost. You donâ€™t need to be EE or CS or have experience to join a project! We welcome anyone who is interested.', 'Thereâ€™s no official way to join UCLA IEEE. Simply attend our events and get involved! Ways to get involved:\n<ul>\n<li>Sign up to receive our weekly newsletter: ieee.ucla.edu</li>\n<li>Join the global IEEE organization to gain access to special events: ieee.org</li>\n<li>Join one of our 4 year-long projects: OPS, C3, Micromouse, Natcar</li>\n<li>Start your own independent project or join someone elseâ€™s.</li>\n</ul>', '<<ul>\n<li>First General Meeting: 6PM, Wednesday, October 2, CNSI Auditorium</li>\n<li>Welcome BBQ: Saturday, October 5, Sunset Rec</li>\n<li>Look out for project meetings!</li>\n </ul>'),
(18, 'Phi Sigma Rho', '', 'http://www.phirhobruins.com/', 'president@phirhobruins.com', 'Kimberly Cassacia', '2002', '\n                              Phi Sigma Rho is a social sorority for women majoring in science and engineering.  The UCLA Nu chapter was founded in 2003, and with over 50 active members, has quickly become one of the largest chapters in the country.  Brought together by the stress that comes along with a South Campus major, the women of Phi Sigma Rho take comfort in knowing there is nearly always another sister in the classes.  As a social sorority, the ladies of Phi Sigma Rho know the importance of taking a study break, and do fun event scattered throughout the quarter.  From kayaking and hiking to tea parties and movie nights, as well as events with other organizations and the annual philanthropy, Phi Rho Your Boat, Phi Sigma Rho has something for everyone.', 'Phi Sigma Rho has recruitment at the beginning of fall and spring quarter.  To be considered for membership, you must attend at least two of our rush events.  For more information about the recruitment process, visit our website or contact our vice president of expansion, Thea Percival, at vpexpansion@phirhobruins.com.', ''),
(19, 'Eta Kappa Nu (IEEE-HKN)', '', 'http://www.hkn.ee.ucla.edu/', 'hkn@ee.ucla.edu', 'Duymong Nguyen', '1984', '\n                              Eta Kappa Nu is the National Electrical Engineering Honor Society dedicated to encouraging and recognizing excellence in the IEEE-designated fields of interest.  UCLA''s Iota Gamma Chapter was founded in 1984 by our EE department''s very own Professor Alan Willson. Since its founding, HKN has become indispensable to the department and students by providing free drop-in tutoring through the third and ninth weeks of instruction, Career Fair Prep Week to equip students with the skills necessary to graduate UCLA with a job, and EE Town Hall to give students the ability to voice their concerns in person to professors and student affairs about curriculum improvements and concerns. HKN''s free drop-in tutoring is located at Engineering IV 67-127 (Undergraduate Lounge), which is easily accessible from Boelter''s 5th Floor bridge. Our top-class tutors can help with lower division math, science, and CS courses as well as some upper division EE courses. HKN is also launching its Book Reserve program where you can reference any textbooks for your class without going to the library. Our Career Fair Prep Week has worked with many top names like Intel, Lockheed Martin, and the CIA. Finally, our EE Town Hall is held in mid-November and features top-notch raffles for attendees (last year, we raffled off a Kindle Fire HD!) Just check out our website for details on all of our events.\n', 'To be eligible for invitation to HKN membership, you must be in the top fourth of your junior EE/CSE class or the top third of your senior EE/CSE class.\n', '<ul>\n<li>Career Fair Prep Week: 3rd Week, Mon-Thurs</li>\n<li>Drop-In Tutoring & Book Reserve: 3rd Week - 9th Week</li>\n<li>EE Town Hall: Mid-November (Check Website)</li>\n<ul>'),
(20, 'Engineers Without Borders (EWB)', '', 'https://sites.google.com/site/ewbucla/', 'ewbucla@gmail.com', 'Dasha Gloutak', '2002', '\n                              We are all about doing what you can, with what you have, where you are. Gain hands-on working experience, develop valuable leadership and communication skills, and establish relationships both locally and globally, all while making a positive difference in the world. EWB-USA supports community-driven development programs worldwide by collaborating with local partners to design and implement sustainable engineering projects, while creating transformative experiences and responsible leaders. Our vision is a world in which communities have the capacity to sustainably meet their basic human needs, and that our members have enriched global perspectives through the innovative professional educational opportunities provided by EWB-USA.\n', 'EWB-UCLA welcomes students from all disciplines and backgrounds to join our passionate group of dynamic students and knowledgeable professionals. General meetings are every Tuesday 6:15pm  in Engineering IV, room 38-138. \n', '<ul>\n<li>EWB West Coast Conference (October 11 â€“ 13, 2013)</li>\n<li>Mentorship: Fall BBQ and/or Challenge Course @ Sunset Rec</li>\n<li>Volunteering: Build Day w/ Habitat for Humanity and/or Tree Planting w/ Tree People</li>\n</ul>'),
(21, 'Linux Users Group', '', 'http://linux.ucla.edu', 'members@linux.ucla.edu', 'Troy Sankey', '', '\n                              The Linux Users Group is open to all who wish to learn about Free and\nOpen Source Software, and associated operating systems. Our goal is to\nspread awareness of the ''Open Source Revolution'' through talks,\nseminars, events, and ''installfests''. We have a lounge at 3820 Boelter\nHall, where we meet to discuss open source technologies, and undertake\npersonal projects. LUG maintains relationships with the Computer Science\ndepartment by undertaking contractual research and projects for the\nschool. Membership is free and open to all. You can see our projects,\nview upcoming events, or contact the officers or group mailing list by\nvisiting http://linux.ucla.edu/.\n', 'Download and print our membership application, then hand it in at our\nlounge. Anybody can join!', ''),
(22, 'Engineering Ambassador Program', '', 'http://facebook.com/UCLAEngineers', 'seas.amb.ucla@gmail.com', 'Hooman Barekatain', '2012', '\n                              As Ambassadors to the Henry Samueli School of Engineering and Applied \nScience, our mission is to showcase the quality of our UCLA Engineering undergraduate\neducation and the achievements of our faculty through our interactions with prospective \nstudents, alumni, and guests of our school. Ambassador duties will include giving\nprivate tours of â€˜South Campusâ€™ and research laboratories, addressing the concerns of\nprospective students in their application and decision process. We are looking for students whose passion and integrity will shine through in \ntheir work as an Ambassador to Henry Samueli School of Engineering and Applied \nScience. As wonderful as HSSEAS is already, weâ€™d like our work as ambassadors to \nbring the school to another level.\n', 'Our application process begins in the spring for the following school year. Applicants are required to be a HSSEAS student and to have been attending UCLA for at least 2 quarters.\n', ''),
(23, 'Institute of Transportation Engineers (ITE)', '', 'http://uclaite.wordpress.com/ ', 'iteucla@gmail.com', 'Tiffany Huang', '2006', '\n                               Institute of Transportation Engineers (ITE) is an international organization dedicated to transportation research and professional development. The UCLA ITE student chapter is a rapidly growing club comprised of primarily Civil Engineering students that addresses the student demand for transportation engineering education, increased career opportunities, and networking. ITE holds speaker events and field trips, compete in regional competitions, and organize many social events off campus. We provide a wide variety of professional speakers, from large companies to small, private firms to public, who all work on interesting projects and are eager to share valuable career advice. Our tours include exposure to construction sites and the behind-the-scene engineering responsibilities. We also visit leading engineering firms to establish networks and see what exciting local projects will arise in the near future.\ntl;dr : Come to our speaker events and learn how you can get involved in our projects!\n', 'Go to our first infosession during 2nd week and fill out a membership application! (It''s FREE to join!)\n', '<ul>\n<li>Industry Networking Tailgate (Date TBA)</li>\n<li>Traffic Bowl</li> \n</ul>'),
(24, 'Pilipinos In Engineering (PIE)', '', 'http://www.studentgroups.ucla.edu/piesociety/', 'pies.ucla@gmail.com', 'Ian Cordero', '1993', '\n            Pilipinos In Engineering, or PIE, at UCLA is an engineering society committed to hosting activities and events catered to its members experiences as both Pilipino students and engineering students. PIE makes available useful resources for members, empowering students to take an active role in their education. The programs and meetings conducted by PIE offer students an additional space to foster senses of camaraderie as well as develop and hone leadership skills necessary to succeed in the competitive job market available to Engineering students.', 'There are absolutely no restrictions for joining PIE -- anybody at UCLA is welcome to join.', 'Look out for PIE''s MacGyver Challenge, held at least once a quarter, where members form teams and compete against each other to build the most functional gadget out of ordinary, everyday items! Date TBD.'),
(25, 'Association for Computing Machinery (ACM)', '', 'http://acm.cs.ucla.edu', 'ucla-acm-officers@googlegroups.com', 'Samir Mody', '1975', '\n            ACM will keep you informed of major opportunities that should be considered byeveryone who is interested in Computer Science. These opportunities may consist of programming competitions and industry speaker events. We may be able to help you answer important questions, such as:\n            What field of Computer Science do I really like? Where am I going to work after I graduate? Should I go to graduate school? What is this Linux thing, and do I need to learn it?', '', ''),
(26, 'Society of Women Engineers (SWE)', '', 'www.seas.ucla.edu/swe', 'swe@seas.ucla.edu', 'Samir Mody', '1975', '\n            The Society of Women Engineers (SWE), founded in 1950, is a not-for-profit educational and service organization in the United States. SWE is the driving force that establishes engineering as a highly desirable career aspiration for women. SWE empowers women to succeed and advance in those aspirations and be recognized for their life-changing contributions and achievements as engineers and leaders. SWE has over 21,000 members in nearly 100 professional sections and 300 student sections throughout the United States.\nSWE-UCLA has a huge presence throughout the school of engineering and is extremely active as last year, we hosted over 100 events last year (an average of 2 to 3 events per week).  Our events focus on developing professional skills, networking with not only peer engineers but also industry representatives and professors, mentoring and guiding first year/transfer students into the school of engineering, and outreaching to elementary/middle schoolers to motivate them to consider pursuing engineering in their future.  We host company infosessions every other week to give students a chance to explore various companies, and network with industry representatives on a more personal level.  These infosessions also typically include workshops that help guide students in their job/internship searches, such as interviewing or resume building workshops.  We also host Wow! That''s Engineering! outreach event, which has over 100 attendees every year to introduce young girls to the exciting world of engineering.  On the internal side, we hold professor networking dinners, and various mentorship events such as course planning workshops. Additionally every fall, we hold a Major fair, where students can explore the various types of engineering disciplines to make sure that they can find a major that''s right for them.  But SWE isn''t just about business!  We love having tons of fun through our awesome social events such as our annual Gingerbread House Making Competition, Christmas Party, and Valentine''s Day Card Making Social, just to name a few.  Last but not least, we host the largest student-run engineering event, Evening with Industry (EWI), which has been up and running at UCLA for over 36 years, and is consistently sold out within the first few weeks of ticket sales.  Hosting over 200 students and 30 companies every year, this event consists of a fancy sit-down banquet style dinner for students and company representatives to network and interact on a very personal level.  The banquet is followed by a giant corporate sponsored raffle with prizes worth over $1000 and a private career at the end only for attendees.  We always get great feedback from companies and students alike, with lots of companies finding future hires in their company from this event alone!', 'Become a member by visiting www.swe.org and click on membership << join.  The fee to join is $20/year OR $50 for your entire duration of being a college student (undergraduate and graduate school!) and one year of professional membership if you choose the C2C option. For further questions, feel free to contact our Membership and Recruitment director, Seema Barua at membership.swe.ucla@gmail.com\n ', '<ul>\n<li>Evening with Industry</li>\n<li>Wow! That''s Engineering</li>\n<li>Corporate Speed Mentoring Night</li>\n<li>Major Fair</li>\n<li>Family System</li>\n<li>Company Information Sessions and Workshops</li>\n<li>Team Tech</li>\n<li>Fall Open House</li>\n<li>Mentorship Course Planning Workshops (Quarterly)</li>\n<li>Professor Dinner</li>\n<li>Alumni Networking Panel Luncheon</li>\n<li>Boeing Etiquette Dinner</li> \n</ul>\n'),
(30, 'Chi Epsilon (XE)', '', 'https://sites.google.com/site/chiepsilonatucla/', 'ckdbsxo@gmail.com', 'Dennis Cha', '1994', '\n            Chi Epsilon (XE) is the Civil Engineering Honor Society, one of only a few engineering disciplines to have their own distinct honor societies at UCLA. We not only initiate candidates to improve their job skills but also offer professional development opportunities for non-members to become interested in XE. \n', 'To get into Chi Epsilon, applicants must be an upperclassmen (sophomore and above standing) and be in the top third of the civil engineering class.\n                ', ''),
(31, 'Baja SAE', '', 'http://uclaracing.org/baja/', 'jleung@uclaracing.org', '', '', '\n            <p>Baja SAE is an international collegiate design competition sponsored by the Society of Automotive Engineers (SAE). The contest challenges each team to function as a small business whose task is to design, fabricate, market, and race an off-road vehicle that is evaluated from a variety of engineering perspectives. Each year SAE hosts a West, Midwest, and East competition in which approximately 100 teams from around the world bring their vehicles to undergo rigorous testing.</p>\n<p>UCLA Racing provides real-world, team-oriented experience for students through the process of designing, building, and racing an off-road vehicle. The team is open to university students from all backgrounds and majors. Mentorship is provided to all new team members through structured student-run design lectures and in-shop machining tutorials. Bajaâ€™s curriculum complements UCLAâ€™s formal education by providing students with the opportunity to gain hands-on experience.</p>\n<p>We welcome all majors, not just mechanical. Feel free to drop by our shop in Boelter Hall, Room 2730B. </p>', 'Attend our training sessions and general meetings. General Meetings are Tuesday nights at 7pm.\nFirst General Meeting is October 1st.\n', ''),
(32, 'CalGeo', '', 'www.calgeobruins.com', 'calgeobruins@gmail.com', 'Sean Munter', '2008', '\n            The CalGeo Student Chapter at UCLA aims to introduce students to the unique field of geotechnical engineering. The chapter aims connect students to academic and industrial professionals, as well as encourage interaction between undergraduate and graduate students. Throughout the year the club organizes many events, from bringing in speakers with a variety of experience and expertise, organizing field trips, to competing at national conferences. The events present opportunities for students to interact with professionals and exposure to practical application of geotechnical engineering. ', 'Send us an email or simply sign up at one of our events. \n', '<ul>\n	<li>Fall Student Professor BBQ</li>\n	<li>Mechanically Stabilized Earth (MSE) Wall Project </li>\n	<li>Speakers and field trips throughout the year</li>\n	<li>UCLA Geo-Expo â€“ our annual end of year celebration and networking night. </li>\n	</ul>\n\n'),
(33, 'American Vacuum Society (AVS)', '', '', 'dashby@ucla.edu', 'David Ashby', '2010', '\n            AVS is a materials science and engineering focused group that works to bring together undergraduate students with an interest in the material sciences. AVS also works to better connect the undergraduate students with industry and the professors at UCLA by having guest speakers and internship nights. We focus on the lighter side also with board game nights and fun competitions like testing the strength of gingerbread houses to help facilitate the relationship between the lower and upper classman.  By joining AVS, ones get access to a vast amount of information about classes and tests through the experience of graduate students and upper classman.', 'We welcome any student with an interest in materials science or wants to meet new people. To join just email David Ashby at dashby@ucla.edu to gain email notifications about upcoming events.', '<ul>\n<li>Welcome Night</li>\n<li>How to get into Research</li>\n</ul>\n'),
(34, 'BruinKSEA', '', 'www.bruinksea.org ', 'bruinksea@gmail.com', 'Thomas Yoon', '2007', '\n            <p>KSEA, short for Korean-American Scientists and Engineers Association, is established in 1971 as a non-profit professional organization. It has now grown to over 4500 registered active undergraduate, graduate, professional, and industry members with 70 local chapters and 14 technical groups across the United States.</p>\n            <p>BruinKSEA, short for KSEA at UCLA, is established 2009 as part of Southern California YG (undergraduate) chapters. It has now grown to over 200 registered members. We welcome undergraduates, graduates, and researchers of UCLA within scientific and engineering field. Membership benefits of BruinKSEA include networking with other KSEA YG chapters within Southern California (Harvey Mudd College, USC, CalTech, UCSD, UCI, and CSULB), developing leadership through volunteering academic activities and participate in national conferences such as YGTLC, UKC and SWRC. </p>', 'Register in the headquarterâ€™s website and obtain KSEA ID, Go to our official websiteâ€™s direction on how to become a member at http://www.bruinksea.org/membership-2/how-to-become-a-member/. It is free for undergraduate students. ', '<ul>\n<li>Bowling Night with KSEA@USC </li>\n<li>Sunset Req Korean BBQ with Harvey Mudd, USC, UCI, and CSULB</li>\n<li>YGTLC Conference in Houston, TX (tentative)</li>\n</ul>\n'),
(35, 'Design/Build/Fly (DBF)', '', '', 'edwardwbarber@gmail.com', 'Edward Barber', '', '\n            Design-Build-Fly at UCLA is a student-run engineering group based around the American Institute of Aeronautics and Astronauticsâ€™ annual Design-Build-Fly competition.  Co-hosted by Cessna and Raytheon Missile Systems, the competition gives students the opportunity to design and build a RC airplane.  ', 'All students are welcome to join!  For details, please email Edward Barber at edwardwbarber@gmail.com.', ''),
(36, 'American Indian Science and Engineering Society (AISES)', '', 'https://sites.google.com/site/uclaaises/home', 'ucla.aises@gmail.com', 'Omar Leyva', '1990', '            Entering its nineteenth year on campus, AISES strives to encourage American Indians to pursue careers as scientists and engineers while preserving their cultural heritage. The goal of AISES is to substantially increase the representation of American Indians and Alaskan Natives in engineering, science, and other related technology disciplines. AISES devotes most of its energy to its outreach event where members put on engineering workshops for students from local middle schools, other wise known as Youth Motivation Day. In addition, AISES also conducts tutoring at local schools to help students succeed in math. Serving as mentors and role models for younger students enables UCLA AISES students to further develop professionalism and responsibility while maintaining a high level of academic excellence and increasing cultural awareness.', 'Come to our meetings every other Tuesday. Email us or visit our website to find out when the first meeting is.', '<ul>\n<li>Biweekly Meetings</li>\n<li>Weekly Tutoring Sessions</li>\n<li>Youth Motivation Day</li>\n<li>Frybread Fundraisers</li>\n</ul>\n');

-- --------------------------------------------------------

--
-- Table structure for table `club_type`
--

CREATE TABLE `club_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `club_type`
--

INSERT INTO `club_type` (`id`, `name`) VALUES
(1, 'Honor Society'),
(2, 'Project'),
(3, 'Professional'),
(4, 'Social'),
(5, 'Service'),
(6, 'Fraternity/Sorority');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(11) NOT NULL,
  `major_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `club_id`, `major_type_id`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 3, 3),
(4, 4, 2),
(5, 4, 6),
(6, 4, 7),
(7, 4, 8),
(8, 5, 2),
(9, 5, 6),
(10, 5, 7),
(11, 5, 8),
(12, 6, 1),
(13, 7, 9),
(14, 8, 3),
(15, 8, 4),
(16, 9, 1),
(17, 10, 6),
(18, 10, 7),
(21, 12, 2),
(22, 12, 6),
(23, 12, 7),
(24, 12, 8),
(25, 13, 1),
(26, 14, 1),
(27, 15, 4),
(28, 16, 1),
(29, 17, 8),
(30, 18, 1),
(31, 19, 7),
(32, 19, 8),
(33, 20, 1),
(34, 21, 6),
(35, 21, 7),
(36, 22, 1),
(37, 23, 5),
(38, 24, 1),
(39, 25, 6),
(40, 25, 7),
(41, 26, 1),
(42, 27, 5),
(43, 28, 5),
(44, 29, 5),
(45, 30, 5),
(46, 31, 2),
(47, 32, 5),
(48, 33, 9),
(49, 34, 1),
(50, 35, 2),
(51, 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `major_type`
--

CREATE TABLE `major_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `major_type`
--

INSERT INTO `major_type` (`id`, `major`) VALUES
(1, 'All'),
(2, 'Aerospace/Mechanical'),
(3, 'Bio'),
(4, 'Chemical'),
(5, 'Civil/Environmental'),
(6, 'CS'),
(7, 'CSE'),
(8, 'Electrical'),
(9, 'Materials');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(11) NOT NULL,
  `club_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `club_id`, `club_type_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 3, 3),
(5, 4, 2),
(6, 5, 2),
(7, 6, 5),
(8, 7, 3),
(9, 8, 3),
(10, 9, 3),
(11, 9, 4),
(12, 10, 1),
(14, 12, 2),
(15, 13, 3),
(16, 13, 4),
(17, 13, 6),
(18, 14, 4),
(19, 14, 6),
(20, 15, 3),
(21, 16, 3),
(22, 17, 2),
(23, 17, 3),
(24, 18, 4),
(25, 18, 6),
(26, 19, 1),
(27, 20, 2),
(28, 20, 5),
(29, 21, 2),
(30, 22, 5),
(31, 23, 2),
(32, 23, 3),
(33, 24, 4),
(34, 25, 3),
(35, 26, 3),
(36, 26, 4),
(37, 27, 1),
(38, 28, 1),
(39, 29, 1),
(40, 30, 1),
(41, 31, 2),
(42, 32, 2),
(43, 32, 3),
(44, 33, 3),
(45, 34, 4),
(46, 35, 2),
(47, 36, 4);
