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


//

const playButton = document.querySelector('.fa-play-circle');
const progressBar = document.querySelector('#progress_bar');
const slider = document.querySelector('.slider');
const sliderHandle = document.querySelector('.slider_handle');
const volumeBar = document.querySelector('#volume_bar');
const volumeSlider = volumeBar.querySelector('.slider');
const volumeHandle = volumeBar.querySelector('.slider_handle');

//

playButton.addEventListener('click', () => {
    if (audio.paused) {
      audio.play();
    } else {
      audio.pause();
    }
  });

  //

  progressBar.addEventListener('click', (event) => {
    const barWidth = progressBar.offsetWidth;
    const clickPosition = event.offsetX;
    const percent = clickPosition / barWidth;
    audio.currentTime = audio.duration * percent;
    
  });


  //

  volumeBar.addEventListener('click', (event) => {
    const barWidth = volumeBar.offsetWidth;
    const clickPosition = event.offsetX;
    const percent = clickPosition / barWidth;
    audio.volume = percent;
  });

//

  let isDragging = false;

slider.addEventListener('mousedown', () => {
  isDragging = true;
});

document.addEventListener('mousemove', (event) => {
  if (isDragging) {
    const sliderWidth = slider.offsetWidth;
    const mousePosition = event.clientX - slider.getBoundingClientRect().left;
    let percent = mousePosition / sliderWidth;

    if (percent < 0) {
      percent = 0;
    } else if (percent > 1) {
      percent = 1;
    }

    const handlePosition = percent * sliderWidth;
    sliderHandle.style.left = handlePosition + 'px';
    audio.currentTime = audio.duration * percent;
  }
});

document.addEventListener('mouseup', () => {
  isDragging = false;
});

volumeSlider.addEventListener('mousedown', () => {
  isDragging = true;
});

document.addEventListener('mousemove', (event) => {
  if (isDragging) {
    const sliderWidth = volumeSlider.offsetWidth;
    const mousePosition = event.clientX - volumeSlider.getBoundingClientRect().left;
    let percent = mousePosition / sliderWidth;

    if (percent < 0) {
      percent = 0;
    } else if (percent > 1) {
      percent = 1;
    }

    const handlePosition = percent * sliderWidth;
    volumeHandle.style.left = handlePosition + 'px';
    audio.volume = percent;
  }
});

document.addEventListener('mouseup', () => {
  isDragging = false;
});
