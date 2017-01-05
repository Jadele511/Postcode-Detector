
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

    <title>Postcode </title>

    <style type="text/css">

      html {
          background: url(bg.jpg) no-repeat center center fixed;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }

       body {

        background: none;
        color: white;
       }

       .container {

        width: 500px;
        text-align: center;
        margin-top: 100px;
       }


       input {

        margin: 20px 0;

       }

       #weather {

        padding-top: 30px;
        width: 500px;
        height: 100px;


       }

    </style>
  </head>
  <body>
    <div class="container">

    <h1>Postcode Detector</h1>

      <form >
        <div id="message"> </div>
        <div >
          <label for ="adresss"> Enter your address </label>
          <input type="text" class="form-control" id="address" name= "address" placeholder="E.g. 1100 4th street, SF, CA" value="8 appleton avenue, san francisco" >
        </div><br>

        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
      </form>

    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous">
      </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <script type="text/javascript">

    $("#submit").click(function(event){

        event.preventDefault();

        $.ajax({

            url:"https://maps.googleapis.com/maps/api/geocode/json?address="+ encodeURIComponent($("#address").val())+"&key=AIzaSyC-cIjZK5uvPTwzwUBw6mJ7WdVRMLWWK8w",
            type: "GET",
            success: function (data){

              console.log(data);

              if (data['status'] == "OK") {

                $.each(data["results"][0]["address_components"],function(key, value) {

                  if (value["types"][0] == "postal_code") {

                    $("#message").html('<div class="alert alert-success" role="alert"><strong>Postcode found!</strong> The postcode is '+ value["long_name"] + '</div>');

                  }


                })
              } else {

                $("#message").html('<div class="alert alert-warning" role="alert">Postcode could not be found.Please try again  </div>');

              }
            }

          })
      })
    </script>
  </body>
</html>
