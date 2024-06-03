const btnAddDirectUser = document.querySelector(".form form span");
const boxDirectName = document.querySelector(".box-direct-name");


    btnAddDirectUser.addEventListener("click", () => {
        boxDirectName.innerHTML += `

        <label for="direct-name">اسم المباشر :</label>
        <input type="text" id="direct-name" />
        <label for="Job-name">مكانة المباشر:</label>
        <select name="" id="Job-name">
          <option value="">محاسب</option>
        </select>
        <div class="phones">
          <label for="phone">رقم الجوال:</label>
          <input type="tel" id="phone" />
          <label for="phone">رقم اخر (اختياري):</label>
          <input type="tel" id="phone" />
          <label for="phone">رقم اخر (اختياري):</label>
          <input type="tel" id="phone" />
        </div>
        <hr color="grey">

    
        `;
    });
    



// Scroll Top
scrollBtn =  document.querySelector('.scroll-btn');
window.addEventListener("scroll", function() {
    if (window.scrollY > 100) {
        scrollBtn.classList.add('active');
    } else {
        scrollBtn.classList.remove('active');
    }
});
scrollBtn.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    })
});

