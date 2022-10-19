fetch('http://localhost/ad-rabbithole/api/data.json')
.then(res => res.json())
.then(data => dataOperation(data))

function dataOperation(data) {
  // score = data.score.split(' ');
  // teamOneScore =score[0];
  // teamTwoScore = score[2];
    // teamOneScore = data.score[0];
    // teamTwoScore = data.score.slice(-1);

    // console.log(teamOneScore,teamTwoScore);
    // console.log(score);
    console.log(data);
}