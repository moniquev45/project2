<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="A page dedicated to introducing each member of the team and the team information as a whole">
        <!--Key Words for File-->
        <meta name="keywords" content="html, about, team">
        <!--Author Information-->
        <meta name="author" content="Victoria Rogers" >
        <title>About Page</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>

        <main id="About_Team">
            <!--This is the team photo-->
            <div class="Team_Photo">
                <figure>
                    <img id="Photo_Team" src="images/Team_Photo.png" alt="The team in front of Swinburne university. From left to right the order is Stacey, Vic, Riley and Monique">
                    <figcaption>The Best Big Brain Group (Left - Right) Stacey, Vic, Riley, Monique</figcaption>
                </figure>
            </div>

            <!--This is the individual team information blocks-->
            <div class="Individual_Profiles">
            <!--This is Monique's Profile-->
            <div id="Monique">
                <h2>Monique</h2>
                <table>
                    <thead> <!--The titles of each column-->
                        <tr>
                            <th><strong>Contribution</strong></th>
                            <th><strong>Prior Experience</strong></th>
                            <th><strong>Hobbies</strong></th>
                            <th><strong>Favourite Things</strong></th>
                        </tr>
                    </thead>
                    <tbody> <!--Information about team, including contributions and personal information-->
                        <tr>
                            <td>
                                <ul>
                                    <dl>
                                    <dt><li>Part 1</li></dt>
                                        <input id="Set_Up" type="checkbox" name="Set_Up" />
                                        <label for="Set_Up">Set Up</label>
                                        <ul class="submenu1">
                                            <dd><li><a href="#">Created the GitHub repository</li></dd>
                                            <dd><li><a href="#">Formatting the header and footer on all pages</li></dd>
                                                <dd><li><a href="#">Developing the structure of the pages</li></dd>         
                                                <dd><li><a href="#">Choosing colour and font palettes</li></dd>
                                                <dd><li><a href="#">Developed the navigation for all pages</li></dd>
                                        </ul>
                                        <dd><li>Programming</li></dd>
                                        <ul>
                                            <dd><li>Developed the Job page</li></dd>
                                            <dd><li>Developed the Job listing page</li></dd>
                                            <dd><li>Styled the relevant CSS for these pages</li></dd>
                                            <dd><li>Applied the colour palette to the entire website</li></dd>
                                        </ul>
                                        <dd><li>Organisation</li></dd>
                                        <ul>
                                            <dd><li>Assisted in the creation of Jira epics</li></dd>
                                            <dd><li>Assisted in delegating tasks to each team member</li></dd>
                                        </ul>
                                        <dt><li>Part 2</li></dt>
                                            <dd><li>Set Up</li></dd>
                                            <ul>
                                                <dd><li>Creating the github repository</li></dd>
                                                <dd><li>Changing html files to php</li></dd>
                                            </ul>
                                            <dd><li>Programming</li></dd>
                                            <ul>
                                                <dd><li>Updated the job page with</li></dd>
                                                <dd><li>Updated the job listing page with</li></dd>
                                            </ul>
                                            <dd><li>Organisation</li></dd>
                                            <ul>
                                                <dd><li></li></dd>
                                            </ul>
                                    </dl>
                                </ul>
                            </td> <!--Contribution-->
                            <td>
                                <ul>
                                    <li>Units 1/2 Applied Computing</li>
                                    <li>Units 3/4 Software Development</li>
                                    <li>Creating a Ticket Management Application for Musical Theatre</li>
                                    <li>Programming and Designing a Doormat that notifies you if you have a package.</li>
                                </ul>
                            </td> <!--Prior Experience-->
                            <td>
                                <ul>
                                    <li>Knitting</li>
                                    <li>Drawing</li>
                                    <li>Singing</li>
                                    <li>Musical Theatre</li>
                                    <li>Programming</li>
                                    <li>Crocheting</li>
                                    <li>Video Games</li>
                                </ul>
                            </td> <!--Hobbies-->
                            <td>
                                <ul>
                                    <li><em>Colour: </em>Pink</li>
                                    <li><em>Food: </em>Persimmons</li>
                                    <li><em>Drink: </em>Tea</li>
                                    <li><em>Animal: </em>Dolphins</li>
                                    <li><em>Band: </em>Heathers the Musical</li>
                                    <li><em>Film: </em>She's the Man</li>
                                </ul>
                            </td> <!--Favourite Things-->
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--This is Riley's Profile-->
            <div id="Riley">
                <h2>Riley</h2>
                <table>
                    <thead>
                        <tr>
                            <th><strong>Contribution</strong></th>
                            <th><strong>Prior Experience</strong></th>
                            <th><strong>Hobbies</strong></th>
                            <th><strong>Favourite Things</strong></th>
                        </tr>
                    </thead>
                    <tbody> <!--Information about team, including contributions and personal information-->
                        <tr>
                            <td>
                                <dl>
                                    <dt>Formatting</dt>
                                        <dd>Colour pallett design</dd>
                                        <dd>Created company graphic</dd>
                                    <dt>Programming</dt>
                                        <dd>Created the home page and associated CSS</dd>
                                    <dt>Jira</dt>
                                        <dd>Assissted with stories</dd>
                                </dl>
                            </td> <!--Contribution-->
                            <td>
                                <ul>
                                    <li>1&2 Applied Computing</li>
                                    <li>3&4 Software Development</li>
                                    <li>3&4 Algorithmics</li>
                                    <li>Work experience with a Siemen's contractor</li>
                                    <li>Created an app to calculate your due income tax</li>
                                </ul>
                            </td> <!--Prior Experience-->
                            <td>
                                <ul>
                                    <li>Programming</li>
                                    <li>Video Games</li>
                                    <li>Reading</li>
                                    <li>Listening to music</li>
                                    <li>Watching musicals</li>
                                    <li>Learning useless trivia</li>
                                    <li>Cats</li>

                                </ul>
                            </td> <!--Hobbies-->
                            <td>
                                <ul>
                                    <li><em>Colour: Blue</em></li>
                                    <li><em>Food: Butter Chicken</em></li>
                                    <li><em>Drink: Ginger Beer</em></li>
                                    <li><em>Animal: Domestic cat</em></li>
                                    <li><em>Band: Heaven Pierce Her</em></li>
                                    <li><em>Film: SCP:Overlord</em></li>
                                </ul>
                            </td> <!--Favourite Things-->
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--This is Stacey's Profile-->
            <div id="Stacey">
                <h2>Stacey</h2>
                <table>
                    <thead>
                        <tr>
                            <th><strong>Contribution</strong></th>
                            <th><strong>Prior Experience</strong></th>
                            <th><strong>Hobbies</strong></th>
                            <th><strong>Favourite Things</strong></th>
                        </tr>
                    </thead>
                    <tbody> <!--Information about team, including contributions and personal information-->
                        <tr>
                            <td>
                                <dl>
                                    <dt>Jira</dt>
                                        <dd>Created epics</dd>
                                    <dt>Coding</dt>
                                        <dd>Created the Apply and Contact pages. Styled the css for them.</dd>
                                    <dt>Organisation</dt>
                                        <dd>Outlined tasks needed to be performed to approprioately assign jobs. Created initial plan</dd>
                                </dl>
                                    
                            </td> <!--Contribution-->
                            <td>
                                <ul>
                                    <li>Absolutely zero prior experience</li>
                                </ul>
                            </td> <!--Prior Experience-->
                            <td>
                                <ul>
                                    <li>Reading</li>
                                    <li>Sculpting</li>
                                    <li>Painting</li>
                                    <li>Video Games</li>
                                    <li>But mainly reading</li>
                                </ul>
                            </td> <!--Hobbies-->
                            <td>
                                <ul>
                                    <li><em>Colour: Gem colours </em></li>
                                    <li><em>Food: Pasta </em></li>
                                    <li><em>Drink: Chai Latte </em></li>
                                    <li><em>Animal: Frog </em></li>
                                    <li><em>Band: Epic the Musical </em></li>
                                    <li><em>Film: No films, Taskmaster series all the way</em></li>
                                </ul>
                            </td> <!--Favourite Things-->
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--This is Vic's Profile-->
            <div id="Vic">
                <h2>Vic</h2>
                <table> 
                    <thead>
                        <tr>
                            <th><strong>Contribution</strong></th>
                            <th><strong>Prior Experience</strong></th>
                            <th><strong>Hobbies</strong></th>
                            <th><strong>Favourite Things</strong></th>
                        </tr>
                    </thead>
                    <tbody> <!--Information about team, including contributions and personal information-->
                        <tr>
                            <td>
                                <dl>
                                    <dt>Jira</dt>
                                        <dd>Created stories</dd>
                                    <dt>Coding</dt>
                                        <dd>Created the about page</dd>
                                        <dd>Edited the relevant CSS code in <br>regards to the about page</dd>
                                    <dt>Design</dt>
                                        <dd>Created the team photo</dd>
                                </dl>
                            </td> <!--Contribution-->
                            <td>
                                <ul>
                                    <li>Creating small HTML webpages</li>
                                    <li>Completed Intro to Programming &amp; OOP class</li>
                                </ul>
                            </td> <!--Prior Experience-->
                            <td>
                                <ul>
                                    <li>Reading</li>
                                    <li>Video games</li>
                                    <li>Hiking</li>
                                    <li>Four wheel driving</li>
                                    <li>Baking</li>
                                </ul>
                            </td> <!--Hobbies-->
                            <td>
                                <ul>
                                    <li><em>Colour: </em>Pink</li>
                                    <li><em>Food: </em>Chicken nuggets</li>
                                    <li><em>Drink: </em>Monster Peach</li>
                                    <li><em>Animal: </em>Cats!!</li>
                                    <li><em>Band: </em>Fall Out Boy</li>
                                    <li><em>Film: </em>The Dressmaker</li>
                                </ul>
                            </td> <!--Favourite Things-->
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <!--This is the overall team information-->
            <div class="Team_Profile">
                    <h2>The Best Big Brain Group</h2>
                    <p>Welcome to the best group you have ever seen</p>
                    <ul>
                        <li>Wednesday</li>
                        <li>10:30-12:30</li>
                        <li>Rahul Raghavan</li>
                    </ul>
                    <p><strong>Team Members</strong></p>
                    <dl>
                        <dt>Monique</dt>
                            <dd>Student ID: 105910625</dd>
                            <dd>Bachelors of Engineering (Honours)/Bachelors of Computer Science</dd>
                        <dt>Riley</dt>
                            <dd>Student ID: 105925988</dd>
                            <dd>Bachelors of Engineering (Honours)/Bachelors of Computer Sceince</dd>
                        <dt>Stacey</dt>
                            <dd>Student ID: 105904848</dd>
                            <dd>Bachelor of Games &amp; Interactivity / Bachelor of Computer Science </dd>
                        <dt>Vic</dt>
                            <dd>Student ID: 105864492</dd>
                            <dd>Bachelor of Computer Science</dd>
                    </dl>
            </div>
        </main>
         <!-- Including footer file -->
        <?php include 'footer.inc'; ?>
    </body>
</html>