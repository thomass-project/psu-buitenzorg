<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Error</title>
    <style>
        body {
            font-family: Garamond;
        }
        /* Style for the modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black with opacity */
            padding-top: 60px;
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 3px solid white;
            width: 80%;
            max-width: 400px;
            text-align: center;
            border-radius: 28px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }

        /* The Close Button */
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            float: right;
            margin-top: -10px;
            margin-right: -5px;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Message styling */
        .modal-message {
            font-size: 18px;
            color:rgb(141, 26, 26);
            padding: 10px;
            font-weight: bold;
        }

        .modal-button {
            font-family: garamond;
            padding: 12px 24px;
            background-color:rgb(141, 26, 26);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 15px;
            margin-top: 15px;
        }

        .modal-button:hover {
            background-color:rgb(114, 23, 23);
        }
    </style>
</head>
<body>

<!-- Modal HTML -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="modal-message">
        <strong><b style="font-size: 23px">Attention!</b></strong><br>
        <div style="margin-bottom:13px; margin-top: 5px; align: center; width: 100%; border-bottom: 2px solid #aaa;"></div>
        The ID Number you entered is already used for the current ongoing college admission.<br>
        Please use a different ID Number.
    </div>
    <button class="modal-button" onclick="window.location.href='index.php'">Go to Admission</button>
  </div>
</div>

<script>
    // Get the modal and close button
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    // Display the modal
    window.onload = function() {
        modal.style.display = "block";
    }

    // Close the modal when the user clicks on <span> (x)
    span.onclick = function() {
        modal.style.display = "none";
        window.location.href = 'index.php'; // Go back to registration page
    }

    // Close the modal when the user clicks outside of the modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            window.location.href = 'index.php'; // Go back to registration page
        }
    }
</script>

</body>
</html>
