let lines = document.querySelectorAll(".vertical");

function setEqualizer() {
  for (let i = 0; i < lines.length; i += 1) {
    let line = lines[i];
    line.style.animation = `equalizer ${
      Math.random() * (3 - 0.3) + 0.3
    }s ease infinite`;
    line.style.animationDirection = "alternate-reverse";
  }
}

setEqualizer();
