fetch('http://localhost/ad-rabbithole/api/data.json')
.then(res => res.json())
.then(data => dataOperation(data))

function dataOperation(data) {
  if(data.gameStatus == 'NSY'){
    document.querySelector('span.pp_teamOneScore.pp_absolute').innerText = '--';
    document.querySelector('span.pp_teamTwoScore.pp_absolute').innerText = '--';
  }else{
    scoreOperation(data.score)
  }
  logoOperation(data.teamOne.trim(),data.teamTwo.trim());
}

function logoOperation(teamOne,teamTwo) {
  document.querySelector('img.pp_absolute.pp_teamOneLogo').src = `./images/teamLaliga/${teamOne}.png`;
  document.querySelector('img.pp_absolute.pp_teamTwoLogo').src = `./images/teamLaliga/${teamTwo}.png`;
}

function scoreOperation(score){
  check = score.trim().split(/\s+/);
  teamOneScore =check[0];
  teamTwoScore = check[2];
  if(parseInt(teamOneScore,10)<10){ teamOneScore = '0'+teamOneScore}
  if(parseInt(teamTwoScore,10)<10){ teamTwoScore = '0'+teamTwoScore}

    document.querySelector('span.pp_teamOneScore.pp_absolute').innerText = teamOneScore;
    document.querySelector('span.pp_teamTwoScore.pp_absolute').innerText = teamTwoScore;
}