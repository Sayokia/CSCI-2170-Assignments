# CSCI 2170
## Assignment 2 (Winter 2020)

### Student Details
Student Name:Yanlin Zhu
B00 Number: B00812966
Dal E-mail Address: yn842496@dal.ca


### Description of Changes Made to Folders/Files
In this project, 6 new PHP files are created: [1]login.php shows the login form to the users and send entered information to the backend. [2]login_validation.php receives the information sent by login form and validate the information. If the info is invalid, error code 1 will be sent to login.php to display an error message, otherwise, the user will successfully login and sessions are initialized. [3] student_profile.php user will be lead to this page after login which shows the course user registered and the time conflict the user has. [4] add&drop_course.php if the user clicked add or drop button on index page or profile page respectively, he/she will be led to this page showing course information and his schedule. This page display a confirm message asking the user to confirm the add & drop action. [5] add&drop_request_processor.php after the user confirmed the add or drop action, the backend will process his/her request by writing newly added course information into the registration file or deleting the dropped course's information from the file. [6] logout.php After user click logout, all sessions will be destroyed.

One CSS and JS file are created in its folder which are used from an open source project(as cited below) to achieve the functionality of expandable table.

Two images file are included, [1] arrows.png as a part of expanable table(see citations below) to show an arrow icon for expandable table. [2]logo.jpg is a logo of Dalousie University for login form(see citiation below).

Self-checked and domonstrated all acceptance criteria in the lab.

### Academic Integrity Pledge
I, Yanlin Zhu, pledge to ensure that:
[1] The work that I submit in this course is original work that is completed by me in full;
[2] I will give credit to any online/offline content source or person from whom I get help;
[3] I understand that any work that I submit in this course is work done for this course only;
and,
[4] I understand Dalhousie University's academic integrity policy applies to this course and I may incur penalties if I were to violate stated policies.

Signed,
Yanlin Zhu


### Citations

1. The theme used for UI in this assignment uses styles and UI code (HTML) used from the Bootstrap template named "Product Example". Mark Otto, Jacob Thornton, and Bootstrap contributors, Available online at URL: https://getbootstrap.com/docs/4.4/examples/product/ (Accessed: 24 January 2020)
2. Bootstrap core CSS, used from BootstrapCDN.com, Available online at URL: https://www.bootstrapcdn.com/ (Accessed: 24 January 2020)
3. Links to jQuery, Popper.js and JavaScript used from Bootstrap website, Available online at URL: https://getbootstrap.com/ (Accessed: 24 January 2020)
4. Bootstrap-table-expandable css & js used from open-sourced project of Welsiton Ferreira. Available online at https://github.com/desenvolvedorindie/bootstrap-table-expandable (Accessed: 10 February 2020)
5. arrows.png as a part of the bootstrap-table-expandable project retrieved from https://github.com/desenvolvedorindie/bootstrap-table-expandable (Accessed: 10 February 2020)
6. logo.jpg retrieved from https://search.creativecommons.org/photos/746d6df9-870e-40b4-91f8-2b62b41f9f43
7. Solution for csv file line delete is inspired by Boris https://stackoverflow.com/questions/4072015/remove-line-from-csv-file(Accessed: 13 February 2020)
8. Solution for remove a item from the array is inspired by Peter Mortensen https://stackoverflow.com/questions/369602/deleting-an-element-from-an-array-in-php (Accessed: 13 February 2020)
