<?php include "includes/header.php"; ?>
<style>
  .container {
    position: relative;
    top: 199px;
    margin-bottom: 100px;
}
</style>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Ngày xem</h4>
        <div id="dates" style="display: flex; flex-direction: row;"></div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h4>Địa điểm</h4>
        <div id="locations"></div>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-3">
        <h4>Rạp</h4>
        <div id="cinemas"></div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <h4>Phim</h4>
        <div id="movies"></div>
      </div>
      <div class="col-md-3">
        <h4>Suất chiếu</h4>
        <div id="times"></div>
      </div>
    </div>
    
    <div class="col-md-6">
      <button class="btn btn-primary" id="nextButton" onclick="showSeats()">Tiếp theo</button>
    </div>

    <div class="row">
      <div class="col-md-6">
        <h4>Chọn ghế</h4>
        <div id="seats"></div>
      </div>
    </div>
  </div>
  <script>
    const currentDate = new Date();

    function createDates() {
      const datesDiv = document.getElementById('dates');
      for (let i = 0; i < 7; i++) {
        const date = new Date(currentDate);
        date.setDate(date.getDate() + i);
        const dateString = date.toLocaleDateString();
        const btn = document.createElement('button');
        btn.classList.add('btn', 'btn-outline-primary', 'btn-block', 'mb-2');
        btn.textContent = dateString;
        btn.onclick = () => {
          const activeBtns = document.querySelectorAll('#dates button.active');
          activeBtns.forEach((activeBtn) => {
            activeBtn.classList.remove('active');
          });
          btn.classList.add('active');
          selectDate(dateString);
        };
        datesDiv.appendChild(btn);
      }
    }

    function selectDate(date) {
      console.log('Selected date:', date);
    }

    const locations = [
      { name: 'TP Hồ Chí Minh', cinemas: ['CGV Quận 7', 'CGV Quận 1'] },
      { name: 'Hà Nội', cinemas: ['CGV Hà Đông'] },
    ];

    function createLocations() {
      const locationsDiv = document.getElementById('locations');
      locations.forEach((location) => {
        const btn = document.createElement('button');
        btn.classList.add('btn', 'btn-outline-primary', 'btn-block', 'mb-2');
        btn.textContent = location.name;
        btn.onclick = () => {
          const activeBtns = document.querySelectorAll('#locations button.active');
          activeBtns.forEach((activeBtn) => {
            activeBtn.classList.remove('active');
          });
          btn.classList.add('active');
          selectLocation(location);
        };
        locationsDiv.appendChild(btn);
      });
    }

    function selectLocation(location) {
      console.log('Selected location:', location.name);
      createCinemas(location.cinemas);
    }

    function createCinemas(cinemas) {
      const cinemasDiv = document.getElementById('cinemas');
      cinemasDiv.innerHTML = '';
      cinemas.forEach((cinema) => {
        const btn = document.createElement('button');
        btn.classList.add('btn', 'btn-outline-primary', 'btn-block', 'mb-2');
        btn.textContent = cinema;
        btn.onclick = () => {
          const activeBtns = document.querySelectorAll('#cinemas button.active');
          activeBtns.forEach((activeBtn) => {
            activeBtn.classList.remove('active');
          });
          btn.classList.add('active');
          selectCinema(cinema);
        };
        cinemasDiv.appendChild(btn);
      });
    }

    const movieData = {
      'CGV Quận 7': { movie: 'Siêu nhân', times: ['12:05', '14:55', '17:45'] },
      'CGV Quận 1': { movie: 'Tình cảm', times: ['18:05', '20:25'] },
      'CGV Hà Đông': { movie: 'Hài hước', times: ['08:05', '13:30'] },
    };

    function selectCinema(cinema) {
      console.log('Selected cinema:', cinema);
      const data = movieData[cinema];
      createMovies([data.movie]);
      createTimes(data.times);
    }

    function createMovies(movies) {
      const moviesDiv = document.getElementById('movies');
      moviesDiv.innerHTML = '';
      movies.forEach((movie) => {
        const btn = document.createElement('button');
        btn.classList.add('btn', 'btn-outline-primary', 'btn-block', 'mb-2');
        btn.textContent = movie;
        btn.onclick = () => {
          const activeBtns = document.querySelectorAll('#movies button.active');
          activeBtns.forEach((activeBtn) => {
            activeBtn.classList.remove('active');
          });
          btn.classList.add('active');
          selectMovie(movie);
        };
        moviesDiv.appendChild(btn);
      });
    }

    function selectMovie(movie) {
      console.log('Selected movie:', movie);
    }

    function createTimes(times) {
      const timesDiv = document.getElementById('times');
      timesDiv.innerHTML = '';
      times.forEach((time) => {
        const btn = document.createElement('button');
        btn.classList.add('btn', 'btn-outline-primary', 'btn-block', 'mb-2');
        btn.textContent = time;
        btn.onclick = () => {
          const activeBtns = document.querySelectorAll('#times button.active');
          activeBtns.forEach((activeBtn) => {
            activeBtn.classList.remove('active');
          });
          btn.classList.add('active');
          selectTime(time);
        };
        timesDiv.appendChild(btn);
      });
    }

    function selectTime(time) {
      console.log('Selected time:', time);
    }

    function showSeats() {
      
      const seatsDiv = document.getElementById('seats');
      seatsDiv.innerHTML = '';
      const rows = 'ABCDEFGHIJKL';
      for (let i = 0; i < rows.length; i++) {
        const rowDiv = document.createElement('div');
        rowDiv.style.display = 'flex';
        for (let j = 1; j <= 18; j++) {
          const seatDiv = document.createElement('div');
          seatDiv.style.width = '20px';
          seatDiv.style.height = '20px';
          seatDiv.style.border = '1px solid #ccc';
          seatDiv.style.backgroundColor = 'gray';
          seatDiv.style.margin = '5px';
          seatDiv.style.textAlign = 'center';
          seatDiv.style.cursor = 'pointer';
          seatDiv.textContent = rows[i] + j;
          seatDiv.onclick = () => {
            if (seatDiv.classList.contains('active')) {
              seatDiv.classList.remove('active');
              seatDiv.style.backgroundColor = 'gray';
            } else {
              seatDiv.classList.add('active');
              seatDiv.style.backgroundColor = 'green';
            }
          };
          rowDiv.appendChild(seatDiv);
        }
        seatsDiv.appendChild(rowDiv);
      }
      const comboDiv = document.createElement('div');
      comboDiv.innerHTML = '<label for="combo">Combo:</label><div><button class="btn btn-outline-primary" id="combo1" onclick="selectCombo(this)">Combo bắp nước 1 người</button><button class="btn btn-outline-primary" id="combo2" onclick="selectCombo(this)">Combo bắp nước 2 người</button></div>';
      seatsDiv.appendChild(comboDiv);
      const bookButton = document.createElement('button');
      bookButton.classList.add('btn', 'btn-primary', 'btn-block', 'mb-2');
      bookButton.textContent = 'Đặt vé';
      bookButton.onclick = () => bookSeats();
      seatsDiv.appendChild(bookButton);
    }

    function selectSeat(seatDiv) {
      const activeSeatDivs = document.querySelectorAll('#seats div.active');
      activeSeatDivs.forEach((activeSeatDiv) => {
        activeSeatDiv.classList.remove('active');
        activeSeatDiv.style.backgroundColor = 'gray';
      });
      seatDiv.classList.add('active');
      seatDiv.style.backgroundColor = 'green';
    }

    function selectCombo(comboDiv) {
      if (comboDiv.classList.contains('active')) {
        comboDiv.classList.remove('active');
        comboDiv.style.backgroundColor = 'white';
      } else {
        comboDiv.classList.add('active');
        comboDiv.style.backgroundColor = 'green';
      }
    }

    function bookSeats() {
      console.log('Booking seats');
    }

    createDates();
    createLocations();
  </script>
<?php include "includes/footer.php"; ?>