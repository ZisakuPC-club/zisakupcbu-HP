<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    writeData();
}


function writeData(){
    $name = $_POST['personal_name'];
    $user = $_POST['twitter'];
    $skype = $_POST['skype'];

    $data = $data."$name,$user,$skype\r\n";
    $open_file = 'oubo.csv';
    $fp = fopen($open_file, 'ab');

    if ($fp){
        if (flock($fp, LOCK_EX)){
            if (fwrite($fp,  $data) === FALSE){
                print('ファイル書き込みに失敗しました');
            }

            flock($fp, LOCK_UN);
        }else{
            print('ファイルロックに失敗しました');
        }
    }

    fclose($fp);
}

$counter_file = 'count.txt';
$counter_lenght = 8;
$fp = fopen($counter_file, 'r+');
if ($fp) {
    if (flock($fp, LOCK_EX)) {
        $counter = fgets($fp, $counter_lenght);
        $counter++;
        rewind($fp);
        if (fwrite($fp,  $counter) === FALSE) {
            echo ('<p>'.'ファイル書き込みに失敗しました'.'</p>');
        }
        flock ($fp, LOCK_UN);
    }
}
fclose ($fp);

?>
<?php include("./temp/header.php"); ?>
		<!--背景/Codepen(https://codepen.io/cantelope/pen/RgYXmJ)-->
		<canvas id="canvas"></canvas>
		<!--コンテンツ-->
		<div class="contents">
			<div class="canvas-body">
				<div class="card">
					<div class="title">
						<h1>ZisakuPC Club</h1>
					</div>
				</div>
				<div class="menu">
					<span class="menu-button">MENU</span>
					<div class="menu-contents">
						<div class="r">
							<div class="col-2">
								<div class="menu-child">
									<a href="#about">About</a>
								</div>
							</div>
							<div class="col-2">
								<div class="menu-child">
									<a href="#joinus">Join Us</a>
								</div>
							</div>
							<div class="col-2">
								<div class="menu-child">
									<a href="#member">Member</a>
								</div>
							</div>
							<div class="col-2">
								<div class="menu-child">
									<a href="#contact">Contact</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="share">
					<div class="share-title">Share</div>
					<div class="flex">
						<a class="share_btn tw" href="https://twitter.com/intent/tweet?text=自作パソコン部%0a&url=https://zisakupcbu.tk/"" target="_blank" rel="nofollow">
							<i class="fab fa-twitter"></i>
						</a>
						<a class="share_btn fb" href="https://www.facebook.com/sharer/sharer.php?u=https://zisakupcbu.tk/" target="_blank" rel="nofollow">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a class="share_btn ln" href="http://line.me/R/msg/text/?https://zisakupcbu.tk/" target="_blank" rel="nofollow">
							LINE
						</a>
						<a class="share_btn htb" href="http://b.hatena.ne.jp/entry/https://zisakupcbu.tk" target="_blank" rel="nofollow">
							B!
						</a>
					</div>
				</div>
				<div class="counter">
					<div class="counter-title">
						Counter
					</div>
					<div class="counter-body">
						あなたは<?php echo $counter;?>人目の訪問者です
					</div>
				</div>
			</div>
		</div>
		<?php include("./temp/footer.php");?>
		<?php include("./temp/modal.php");?>
	</body>
</html>
