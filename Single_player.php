<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Single Player</title>
    <style type="text/css">
        /*Styling the game*/
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            background-color: rgb(29, 182, 187);
            font-family: sans-serif;
        }

        #container {
            position: relative;
            height: 100vh;
            width: 35%;
            left: 35%;
            background-color: #292929;
            overflow: hidden;
        }

        /*Styling the Road Surface Markings*/
        .line_1,
        .line_2,
        .line_3,
        .line_4 {
            position: absolute;
            height: 200px;
            width: 4%;
            margin-left: 48%;
            background-color: rgba(255, 255, 255, 0.5);
        }

        .line_1 {
            top: -150px;
        }

        .line_2 {
            top: 145px;
        }

        .line_3 {
            top: 440px;
        }

        .line_4 {
            top: 735px;
        }

        .line_5,
        .line_6 {
            position: absolute;
            width: 10px;
            height: 100%;
            background: red;
        }

        .line_6 {
            margin-left: 98%;
        }

        /*Styling the cars*/
        .car {
            position: absolute;
            height: 60px;
            width: 40px;
            border-radius: 5px;
            box-shadow: 0px 1px 8px 0px black;
        }

        #car {
            bottom: 8%;
            left: 60%;
            background-color: #ffdf5a;
        }

        .f_glass,
        .b_glass {
            position: absolute;
            height: 20%;
            width: 60%;
            margin-left: 20%;
            background-color: #484848;
        }

        .f_glass {
            top: 15%;
            border-radius: 0px 0px 5px 5px;
        }

        .b_glass {
            bottom: 15%;
            border-radius: 5px 5px 0px 0px;
        }

        .f_light_l,
        .f_light_r,
        .b_light_l,
        .b_light_r,
        .rev_f_light_l,
        .rev_f_light_r,
        .rev_b_light_l,
        .rev_b_light_r {
            position: absolute;
            height: 10%;
            width: 20%;
        }

        .f_light_l {
            top: -6%;
            margin-left: 10%;
            background-color: #efefef;
            border-radius: 5px 5px 0px 0px;
        }

        .f_light_r {
            top: -6%;
            margin-left: 70%;
            background-color: #efefef;
            border-radius: 5px 5px 0px 0px;
        }

        .b_light_l {
            top: 96%;
            margin-left: 10%;
            background-color: red;
            border-radius: 0px 0px 5px 5px;
        }

        .b_light_r {
            top: 96%;
            margin-left: 70%;
            background-color: red;
            border-radius: 0px 0px 5px 5px;
        }

        .rev_f_light_l {
            top: 96%;
            margin-left: 10%;
            background-color: #efefef;
            border-radius: 0px 0px 5px 5px;
        }

        .rev_f_light_r {
            top: 96%;
            margin-left: 70%;
            background-color: #efefef;
            border-radius: 0px 0px 5px 5px;
        }

        .rev_b_light_l {
            top: -6%;
            margin-left: 10%;
            background-color: red;
            border-radius: 5px 5px 0px 0px;
        }

        .rev_b_light_r {
            top: -6%;
            margin-left: 70%;
            background-color: red;
            border-radius: 5px 5px 0px 0px;
        }

        .f_tyre_l,
        .f_tyre_r,
        .b_tyre_l,
        .b_tyre_r {
            position: absolute;
            height: 20%;
            width: 10%;
            background-color: grey;
        }

        .f_tyre_l {
            top: 20%;
            left: -10%;
            border-radius: 5px 0px 0px 5px;
        }

        .f_tyre_r {
            top: 20%;
            left: 100%;
            border-radius: 0px 5px 5px 0px;
        }

        .b_tyre_l {
            top: 70%;
            left: -10%;
            border-radius: 5px 0px 0px 5px;
        }

        .b_tyre_r {
            top: 70%;
            left: 100%;
            border-radius: 0px 5px 5px 0px;
        }

        #car_1 {
            top: -100px;
            left: 60%;
            background-color: red;
        }

        #car_2 {
            top: -200px;
            left: 40%;
            background-color: blue;
        }

        #car_3 {
            top: -350px;
            left: 50%;
            background-color: green;
        }

        /*Styling the Restart feature*/
        #restart_div {
            position: absolute;
            height: 100%;
            width: 100%;
            background-color: #292929;
            color: white;
            font-family: sans-serif;
            font-size: 40px;
            text-align: center;
            display: none;
        }

        /*Text on the restart button*/
        #restart {
            border: none;
            padding: 25px;
            color: white;
            background-color: #8a64ff;
            font-size: 30px;
            margin-top: 30%;
        }

        .small_text {
            font-size: 15px;
        }

        /*Styling the score board*/
        #score_div {
            position: absolute;
            margin-top: 20%;
            margin-left: 10%;
            font-size: 35px;
            background-color: white;
            color: #454545;
            padding: 10px;
            box-shadow: 4px 4px 0px 1px #808080;
        }

        .return {
            position: absolute;
            padding: 15px 25px;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
            outline: none;
            color: red;
            background-color: rgb(235, 235, 34);
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
            top: 1%;
            left: 1%;
        }

        .return:hover {
            background-color: #3e8e41
        }

        .return:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        #life_div {
            position: absolute;
            margin-top: 15%;
            margin-left: 10%;
            font-size: 35px;
            background-color: white;
            color: #454545;
            padding: 10px;
            box-shadow: 4px 4px 0px 1px #808080;
        }
        #heart_1, #heart_2, #heart_3 {
            background-color: pink;
            height: 50px;
            width: 50px;
            border-radius: 50%; /* Make them circular */
        }


    </style>
</head>

<body>
    
    <!--Score board--> 
    <div>
        <div id="score_div">
            Score: <span id="score">0</span>
        </div>

        <div id="life_div">
            Lives: <span id="lives">3</span>
        </div>
    </div>
    
    <div id="life_icon" class="life"></div>

    
    <!--One div for the rest of the elements of the game since they all will come under one area-->
    <div id="container">
        <!--div for the Road Surface marking-->
        <div class="line_1"></div>
        <div class="line_2"></div>
        <div class="line_3"></div>
        <div class="line_4"></div>
        <div class="line_5"></div>
        <div class="line_6"></div>
        <!--div for the car user will control-->
        <div id="car" class="car">
            <div class="f_glass"></div>
            <div class="b_glass"></div>
            <div class="f_light_l"></div>
            <div class="f_light_r"></div>
            <div class="b_light_l"></div>
            <div class="b_light_r"></div>
            <div class="f_tyre_l"></div>
            <div class="f_tyre_r"></div>
            <div class="b_tyre_l"></div>
            <div class="b_tyre_r"></div>
        </div>
        <!-- id with car_1, car_2 and car_3 is for the obstacle cars-->
        <div id="car_1" class="car">
            <div class="f_glass"></div>
            <div class="b_glass"></div>
            <div class="rev_f_light_l"></div>
            <div class="rev_f_light_r"></div>
            <div class="rev_b_light_l"></div>
            <div class="rev_b_light_r"></div>
            <div class="f_tyre_l"></div>
            <div class="f_tyre_r"></div>
            <div class="b_tyre_l"></div>
            <div class="b_tyre_r"></div>
        </div>
        <div id="car_2" class="car">
            <div class="f_glass"></div>
            <div class="b_glass"></div>
            <div class="rev_f_light_l"></div>
            <div class="rev_f_light_r"></div>
            <div class="rev_b_light_l"></div>
            <div class="rev_b_light_r"></div>
            <div class="f_tyre_l"></div>
            <div class="f_tyre_r"></div>
            <div class="b_tyre_l"></div>
            <div class="b_tyre_r"></div>
        </div>
        <div id="car_3" class="car">
            <div class="f_glass"></div>
            <div class="b_glass"></div>
            <div class="rev_f_light_l"></div>
            <div class="rev_f_light_r"></div>
            <div class="rev_b_light_l"></div>
            <div class="rev_b_light_r"></div>
            <div class="f_tyre_l"></div>
            <div class="f_tyre_r"></div>
            <div class="b_tyre_l"></div>
            <div class="b_tyre_r"></div>
        </div>

        <div id="heart_1" class="car" style="background-color: pink;"></div> 
        <div id="heart_2" class="car" style="background-color: pink;"></div>
        <div id="heart_3" class="car" style="background-color: pink;"></div>


        <!--div for the restart feature-->
        <div id="restart_div">
            <button id="restart">
                <p>Restart</p>
                <small class="small_text">(press Enter)</small>
            </button>
        </div>
    </div>
    
    <button id="return" class="return">↵</button>
    
    <!--Importing JQuery.js(Minimum version)-->
    <script src="jquery.min.js"></script>
    
    
    <script type="text/javascript">
        $(function () {
            var anim_id;
            var lives = 3; // Initial lives
            var life_icon = $('#life_icon');

             // Update life display
            function updateLives() {
                $('#lives').text(lives);
            }
            //saving dom objects to variables
            var container = $('#container'),
                car = $('#car'),
                car_1 = $('#car_1'),
                car_2 = $('#car_2'),
                car_3 = $('#car_3'),
                line_1 = $('.line_1'),
                line_2 = $('.line_2'),
                line_3 = $('.line_3'),
                line_4 = $('.line_4'),
                line_5 = $('.line_5'),
                line_6 = $('.line_6'),
                restart_div = $('#restart_div'),
                restart_btn = $('#restart'),
                score = $('#score');
            
            var heart_1 = $('#heart_1'),
                heart_2 = $('#heart_2'),
                heart_3 = $('#heart_3'),
                hearts = [heart_1, heart_2, heart_3];
            //saving some initial setup
            var container_left = parseInt(container.css('left')),
                container_width = parseInt(container.width()),
                container_height = parseInt(container.height()),
                car_width = parseInt(car.width()),
                car_height = parseInt(car.height()),
                line_width_l = parseInt(line_5.width()),
                line_width_r = parseInt(line_6.width());
            //some other declarations
            var game_over = false,
                score_counter = 1,
                speed = 2,
                line_speed = 2,
                car_spawn_rate = 200,
                move_right = false,
                move_left = false,
                move_up = false,
                move_down = false;
            /* ------------------------------GAME CODE STARTS HERE------------------------------------------- */
            /* Move the cars */
            $(document).on('keydown', function (e) {
                if (game_over === false) {
                    var key = e.keyCode;
                    if (key === 37 && move_left === false) {
                        move_left = requestAnimationFrame(left);
                    } else if (key === 39 && move_right === false) {
                        move_right = requestAnimationFrame(right);
                    } else if (key === 38 && move_up === false) {
                        move_up = requestAnimationFrame(up);
                    } else if (key === 40 && move_down === false) {
                        move_down = requestAnimationFrame(down);
                    }
                }
            });
            $(document).on('keyup', function (e) {
                if (game_over === false) {
                    var key = e.keyCode;
                    if (key === 37) {
                        cancelAnimationFrame(move_left);
                        move_left = false;
                    } else if (key === 39) {
                        cancelAnimationFrame(move_right);
                        move_right = false;
                    } else if (key === 38) {
                        cancelAnimationFrame(move_up);
                        move_up = false;
                    } else if (key === 40) {
                        cancelAnimationFrame(move_down);
                        move_down = false;
                    }
                }
            });
            function left() {
                if (game_over === false && parseInt(car.css('left')) > line_width_l) {
                    car.css('left', parseInt(car.css('left')) - 5);
                    move_left = requestAnimationFrame(left);
                }
            }
            function right() {
                if (game_over === false && parseInt(car.css('left')) < container_width - car_width - line_width_r) {
                    car.css('left', parseInt(car.css('left')) + 5);
                    move_right = requestAnimationFrame(right);
                }
            }
            function up() {
                if (game_over === false && parseInt(car.css('top')) > 10) {
                    car.css('top', parseInt(car.css('top')) - 3);
                    move_up = requestAnimationFrame(up);
                }
            }
            function down() {
                if (game_over === false && parseInt(car.css('top')) < container_height - car_height - 10) {
                    car.css('top', parseInt(car.css('top')) + 3);
                    move_down = requestAnimationFrame(down);
                }
            }
            function heart_down(heart) {
                var heart_current_top = parseInt(heart.css('top'));

                if (heart_current_top > container_height) {
                    heart_current_top = -200; // Reset heart to the top
                    var heart_left = parseInt(Math.random() * (container_width - car_width - line_width_l));
                    heart.css('left', heart_left);
                }

                heart.css('top', heart_current_top + speed); // Move heart down
            }
            
            /* Move the cars and lines */
            anim_id = requestAnimationFrame(repeat);
            function repeat() {
                if (!game_over) {
                    // Check for collisions with obstacle cars
                    if (collision(car, car_1) || collision(car, car_2) || collision(car, car_3)) {
                        lives--;
                        updateLives();
                        if (lives === 0) {
                            stop_the_game();
                        } else {
                            resetObstacleCars(); // Reset positions of obstacle cars
                        }
                    }

                    // Check collisions with hearts
                    hearts.forEach((heart) => {
                        if (collision(car, heart)) {
                            // On collision, increase score or lives
                            score.text(parseInt(score.text()) + 1); // Increase score by 10
                            heart.css('top', -200); // Reset heart position
                        }
                        
                    });


                    // Increment score
                    score_counter++;
                    if (score_counter % 20 === 0) {
                        score.text(parseInt(score.text()) + 1);
                    }

                    // Gradually increase speed
                    if (score_counter % 100 === 0) { // Adjust speed every 500 frames
                        speed += 0.5; // Increase car speed gradually
                        line_speed += 0.5; // Increase line speed gradually
                    }

                    // Increase car spawn rate at higher scores
                    if (score_counter % 300 === 0 && car_spawn_rate > 100) {
                        car_spawn_rate -= 20; // Spawn cars more frequently (minimum cap at 100 frames)
                    }

                    // Move the cars and lines
                    car_down(car_1);
                    car_down(car_2);
                    car_down(car_3);
                    line_down(line_1);
                    line_down(line_2);
                    line_down(line_3);
                    line_down(line_4);

                    // Move hearts
                    heart_down(heart_1);
                    heart_down(heart_2);
                    heart_down(heart_3);

                    // moveLifeIcon();
                    // checkLifePickup();

                    anim_id = requestAnimationFrame(repeat);
                }
            }
            function car_down(car) {
                var car_current_top = parseInt(car.css('top'));
                if (car_current_top > container_height) {
                    car_current_top = -200; // Reset position when car leaves screen
                    var car_left = parseInt(Math.random() * (container_width - car_width - line_width_l));
                    car.css('left', car_left);

                    // Adjust spawn rate for more frequent obstacles
                    if (Math.random() < (1 / car_spawn_rate)) {
                        car.css('top', car_current_top); // Reset car position based on spawn rate
                    }
                }
                car.css('top', car_current_top + speed); // Adjust car speed
            }


            function line_down(line) {
                var line_current_top = parseInt(line.css('top'));
                if (line_current_top > container_height) {
                    line_current_top = -200;
                }
                // Reduce line speed for downward movement
                line.css('top', line_current_top + line_speed);
            }

            restart_btn.click(function () {
                location.reload();
            });
            
            
            // Stop the game function
            function stop_the_game() {
                if (lives === 0) {
                    // Update lives display
                    $("#lives").text(0); 
                    game_over = true;
                    cancelAnimationFrame(anim_id);
                    cancelAnimationFrame(move_right);
                    cancelAnimationFrame(move_left);
                    cancelAnimationFrame(move_up);
                    cancelAnimationFrame(move_down);

                    // Display score and prompt for name
                    const playerScore = parseInt($("#score").text());
                    const playerName = prompt("Game Over! Enter your name:");

                    if (playerName) {
                        saveScoreToDatabase(playerName, playerScore);
                    }

                    // Show restart button
                    restart_div.slideDown();
                    restart_btn.focus();
                }
            }

            function checkLifePickup() {
                if (collision(car, life_icon)) {
                    lives++;
                    updateLives();
                    resetLifeIcon(); // Reposition life icon
                }
            }

            function resetLifeIcon() {
                var icon_left = parseInt(Math.random() * (container_width - 30));
                life_icon.css('left', icon_left);
                life_icon.css('top', -50);
            }

            function moveLifeIcon() {
                var icon_top = parseInt(life_icon.css('top'));
                if (icon_top > container_height) {
                    resetLifeIcon(); // If out of bounds, reposition
                }
                life_icon.css('top', icon_top + line_speed);
            }


            function resetObstacleCars() {
                car_1.css('top', -200);
                car_2.css('top', -400);
                car_3.css('top', -600);
            }
            function saveScoreToDatabase(name, score) {
                $.ajax({
                    url: 'save_score.php', // The PHP script for saving scores
                    type: 'POST',
                    data: { player_name: name, player_score: score },
                    success: function (response) {
                        console.log('Score saved successfully:', response);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error saving score:', error);
                    }
                });
            }


            /* ------------------------------GAME CODE ENDS HERE------------------------------------------- */
            function collision($div1, $div2) {
                var x1 = $div1.offset().left,
                    y1 = $div1.offset().top,
                    h1 = $div1.outerHeight(true),
                    w1 = $div1.outerWidth(true),
                    b1 = y1 + h1,
                    r1 = x1 + w1,
                    x2 = $div2.offset().left,
                    y2 = $div2.offset().top,
                    h2 = $div2.outerHeight(true),
                    w2 = $div2.outerWidth(true),
                    b2 = y2 + h2,
                    r2 = x2 + w2;
                if (b1 < y2 || y1 > b2 || r1 < x2 || x1 > r2) return false;
                return true;
            }

        });    
    </script>
    <script type="text/javascript">
        document.getElementById("return").onclick = function () {
            location.href = "Main_menu.php";
        };
    </script>
</body>

</html>
