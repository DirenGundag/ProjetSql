<?php
require_once "../Pages/dbconnexion.php";

?>


<style>
form {
  max-width: 500px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
  border: 2px solid #ccc;
  padding: 20px;
  border-radius: 10px;
  margin-top: 2%;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
textarea {
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  width: 100%;
  box-sizing: border-box;
  margin-bottom: 15px;
}

input[type="submit"] {
  background-color: #333;
  color: #fff;
  border: none;
  padding: 12px 20px;
  border-radius: 5px;
  cursor: pointer;
  margin-left: 40%;
}

input[type="submit"]:hover {
  background-color: #555;
}

.error {
  color: red;
  font-size: 0.8em;
  margin-bottom: 5px;
}

h1 {
  text-align: center;
  margin-top: 2%;
}

textarea {
  height: 150px;
}

  </style>
  