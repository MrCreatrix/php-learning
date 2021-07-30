<?php
//city list json import
$str = file_get_contents( 'city.list.json');

$json = json_decode($str, true); ?>

<!doctype html>
<html>

<head>
    <title>Forecast Weather using OpenWeatherMap with PHP</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <link rel="stylesheet" href="assets/css/weather.css">
</head>

<body>

    <div class="report-container">

        <div class="form-field">

            <h1 for="city">Choose a City:</h1>

            <select name="city" id="isCity"> <?php
					foreach($json as $value){ ?>
                <option value='<?php echo $value['id']?>'>
                    <?php echo $value['name']; ?>
                </option>
                <?php
						}
					?>
            </select>

        </div>

        <div class="form-field">

			
			<input type="button" value="click me" onclick="myFunction()">
			
			<button id="submit">Click Me</button>
			<div id="content"></div>

            <script>
				function myFunction() {
					//get value from option in js
					var x = document.getElementById("isCity").selectedIndex;
					var int_val = document.getElementsByTagName("option")[x].value;
					alert(int_val);
				}
            </script>

				<script>
					$(document).ready(function(){
						var url = window.location.href;
						var params = url.split('?ID=int_val');
						var id = (params[1]);

						$("#submit").click(function(){
								$.ajax({
									type:"POST",
									url:"test.php",
									data:{id:id},
									success:function(result){
										$("#content").html(result);
										$("#submit").hide();
									}
								});
							});
						});
				</script>
           

				<?php
					$random = $_POST["id"];
					echo $random;
					?>
				</div>

        <?php

		$apiKey = "ba5a3176bd5273cba6157609e3affb1a";
		$cityId = "";


		$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);

		curl_close($ch);
		$data = json_decode($response);
		$currentTime = time();
		?>
        <h2><?php echo $data->name; ?>Weather Status</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>


        <div class="weather-forecast">
            <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /><?php echo $data->main->temp_max; ?>&deg;C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind['speed']; ?> km/h</div>
        </div>
    </div>

</body>

</html>