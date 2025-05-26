CREATE TABLE about (
    team_member_id INT(3) NOT NULL,
    member_name TEXT NOT NULL,
    member_contribution TEXT NOT NULL,
    member_experience TEXT NOT NULL,
    member_hobby TEXT NOT NULL,
    member_favourite TEXT NOT NULL
);

INSERT INTO about (team_member_id, member_name, member_contribution, member_experience, member_hobby, member_favourite) VALUES 
(001, 'Monique', 'Created the GitHub repositories for p1 and p2.*Formatted header and footer on all webpages.*Chose colour palette.*Choose fonts.*Developed the Job page.*Develop the Job Listing page.*Styled the relevant CSS.*Assisted in the creation of Jira epics.*Assisted in delegating tasks to each member in p1 and p2.*Changed files to php.*Updated the job page with PHP.*Created and developed the job database table.*Assisted with creation of incorparted nav, footer and header.*Created and styled the manager icon.', 'Units 1/2 Applied Computing*Units 3/4 Software Development.*Creating a Ticket Management Application for Musical Theatre*Programming and designing a doormat that notifies you if you have a package', 'Knitting*Drawing*Singing*Musical Theatre*Programming*Crocheting*Video games', 'Colour: Pink*Food: Persimmons*Drink: Tea*Animal: Dolphins*Band: Heather the Musical*Film: She''s the man');


INSERT INTO about (team_member_id, member_name, member_contribution, member_experience, member_hobby, member_favourite) VALUES (002, 'Riley', 'Set and chose colour palette*Created company graphics*Developed the Home Page*Assisted with the development of Jira stories*Developed the manager_login.php and login/logout features', 'Units 1/2 Applied Computing*Units 3/4 Software Development*Units 3/4 Algorithmics*Work experience with a Siemen''s contractor*Created an app to calculate your due income tax', 'Programming*Video Games*Reading*Listening to music*Watching Musicals*Learning trivia*Cats', 'Colour: Blue*Food: Butter Chicken*Drink: Ginger Beer*Animal: Domestic cat*Band Heaven Pierce Her*Film: SCP:Overlord'
);

INSERT INTO about (team_member_id, member_name, member_contribution, member_experience, member_hobby, member_favourite) VALUES (003, 'Stacey', 'Created Jira epics*Developed the Apply and Contact pages*Styled the relevant CSS for these pages*Outline and delegated tasks needed to be complete for both p1 and p2*Developed the PHP header, footer and nav .inc files*Developed the EOI process*Developed the receipt system', 'No prior experience', 'Reading*Sculpting*Painting*Video Games*But mainly reading', 'Colour: Gem colours*Food: Pasta*Drink: Chai Latte*Animal: Frog*Band: Epic the Musical*Film: No films, Taskmaster series all the way'
);

INSERT INTO about (team_member_id, member_name, member_contribution, member_experience, member_hobby, member_favourite) VALUES (004, 'Vic', 'Created Jira stories*Developed the about page*Styled the relevant CSS*Created the team photo*Developed the PHP team member data base*Altered the about page to print the database*Developed the lock out system if incorrect password is entered*Developed the sorting system for the EOI fields', 'Created small HTML webpages*Intro to Programming*Object Oriented Programming', 'Reading*Video games*Hiking*Four wheel driving*Baking', 'Colour: Pink*Food: Chicken nuggets*Drink: Monster Peach*Animal: Cats!!*Band: Fall Out Boy*Film: The Dressmaker'
);