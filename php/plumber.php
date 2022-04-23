<?php
//create function userExists
function userExists($username) {
    // global keywords is used to access a global variable from within a function
    global $connect;

    $sql = "SELECT * FROM plumbers WHERE username = '$username'"; // select  donor by username
    $query = $connect->query($sql);// execute query

    //check user email
    if($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $connect->close(); // database close
    // close the database connection
}


//make function registerUser
function registerUser() {
    // global keywords is used to access a global variable from within a function
    global $connect;

//    //image upload
//    $fileinfo = PATHINFO($_FILES['image']['name']); // file information
//    $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension']; // upload path and name with extension
//    move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename); // upload file
//    $location = $newfilename; // location info

    $fname      = $_POST['fname']; //decleare variable fname and put it into post method
    $lname      = $_POST['lname']; //decleare variable lname and put it into post method
    $username   = $_POST['username']; //decleare variable username and put it into post method
//    $address    = $_POST['address']; //decleare variable address and put it into post method
    $service    = $_POST['service']; //decleare variable service and put it into post method
    $nid        = $_POST['nid']; //decleare variable nid and put it into post method
//    $gender     = $_POST['gender']; //decleare variable gender and put it into post method
    $password   = $_POST['password']; //decleare variable password and put it into post method

    $newPassword = makePassword($password); // make newassword function
    // if password match with confirm password then user data will be inserted into database table students.
    if($newPassword) {
        $created = @date('Y-m-d H:i:s');
        $sql = "INSERT INTO plumbers (first_name, last_name, username, service, nid, password, date, status) VALUES ('$fname', '$lname', '$username', '$service', '$nid', '$newPassword', '$created', '0')";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }
    } // /if

    $connect->close();
    // close the database connection
}

// make pssword more secure using hash.
function makePassword($password) {
    return hash('sha256', $password);
}

//get all user information by username
function userdata($username) {
    // global keywords is used to access a global variable from within a function
    global $connect;

    $sql = "SELECT * FROM plumbers WHERE username = '$username'"; // select students username for getteing student data
    $query = $connect->query($sql);
    $result = $query->fetch_assoc(); // get all information
    if($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }

    $connect->close();
    // close the database connection
}

// making function login
function login($username, $password) {
    // global keywords is used to access a global variable from within a function

    global $connect;
    $userdata = userdata($username); // suppose userdata is equal userdata for finding user data by username

    //check  user information
    if($userdata) {
        $makePassword = makePassword($password);
        $sql = "SELECT * FROM plumbers WHERE username = '$username' AND password = '$makePassword' AND status = '0'"; //if username and passwod is match user can loged in otherwise not
        $query = $connect->query($sql);

        //check available user
        if($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    $connect->close();
    // close the database connection
}

// making function getUserDataByUserId .. for finding user information. and it will be get user data via user id
function getUserDataByUserId($id) {
    // global keywords is used to access a global variable from within a function
    global $connect;

    $sql = "SELECT * FROM plumbers WHERE id = $id"; // select all students via id
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    return $result;

    $connect->close();
    //database close
}

// make function to check user exists
function users_exists_by_id($id, $username) {
    // global keywords is used to access a global variable from within a function
    global $connect;

    // if useername all ready registerd into database this query will makesure user data is available there. if not user can regester
    $sql = "SELECT * FROM plumbers WHERE username = '$username' AND id != $id";
    $query = $connect->query($sql);
    if($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}

//make update function
function updateInfo($id) {
    // global keywords is used to access a global variable from within a function
    global $connect;

//	$username    = $_POST['username'];
    $fname       = $_POST['fname'];
    $lname       = $_POST['lname'];
    $contact     = $_POST['contact'];
    $address     = $_POST['address'];
    $gender      = $_POST['gender'];

    //update query
    $sql = "UPDATE plumbers SET  first_name = '$fname', last_name = '$lname', contact = '$contact', address = '$address', gender = '$gender' WHERE id = $id";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }
}
// functio for session logged_in used by user id
function logged_in() {
    if(isset($_SESSION['id'])) {
        return true;
    } else {
        return false;
    }
}
// functio for session not_logged_in used by user id

function not_logged_in() {
    if(isset($_SESSION['id']) === FALSE) {
        return true;
    } else {
        return false;
    }
}

//make logout function
function logout() {
    if(logged_in() === TRUE){
        // remove all session variable
        session_unset();

        // destroy the session
        session_destroy();

        header('location: plumber_login.php');
    }
}
//make function check match password
function passwordMatch($id, $password) {
    // global keywords is used to access a global variable from within a function
    global $connect;

    $userdata = getUserDataByUserId($id); // get user data by their id

    $makePassword = makePassword($password);

    //check password match
    if($makePassword == $userdata['password']) {
        return true;
    } else {
        return false;
    }

    // close connection
    $connect->close();
    //database close
}

//make function change password
function changePassword($id, $password) {
    global $connect;

    $makePassword = makePassword($password);

    $sql = "UPDATE plumbers SET password = '$makePassword' WHERE id = $id";
    $query = $connect->query($sql);

    if($query === TRUE) {
        return true;
    } else {
        return false;
    }
}


