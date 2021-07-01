<?php

while (true){
	exec("curl -I https://profile-counter.glitch.me/{github-username}/count.svg > /dev/null &");
	//file_get_contents('https://profile-counter.glitch.me/{github-username}/count.svg');
}