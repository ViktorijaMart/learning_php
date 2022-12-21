<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        width: 100vw;
    }

    h1 {
        margin-top: 40px;
        margin-left: 40px;
        text-align: center;
    }

    #main {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    #main > div {
        width: 400px;
        height: 200px;
        border: 1px solid black;
        margin: 40px;
    }

    #list,
    #details {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #list > a {
        font-size: 20px;
        color: black;
        cursor: pointer;
        text-decoration: none;
    }

    form > label {
        display: inline-block;
        font-size: 20px;
        margin-bottom: 16px;
    }

    form > input {
        height: 20px;
        margin-bottom: 16px;
    }

    form > button {
        font-size: 16px;
        width: 64px;
    }
</style>
<html>
    <body>
        <h1>WELCOME TO HOME PAGE OF CARS</h1>
        <div id="main">
            <div id="list">
                <a href="car/list">Go to list page</a>
            </div>
            <div id="details">
                <form method="post" action="http://localhost/Paskaitos/OOP/11_Lesson-MVC/CarProject/car/details">
                    <label for="registrationId">Search car by registration ID:</label> <br/>
                    <input type="text" name="registrationId"> <br/>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </body>
</html>
