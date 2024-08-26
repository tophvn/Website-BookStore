// Lấy các phần tử từ DOM
const navbar = document.querySelector(".header .flex .navbar");
const userBox = document.querySelector(".header .flex .account-box");
const menuBtn = document.querySelector("#menu-btn");
const userBtn = document.querySelector("#user-btn");

// Định nghĩa sự kiện click cho nút menu
menuBtn.onclick = () => {
  navbar.classList.toggle("active");
  userBox.classList.remove("active");
};

// Định nghĩa sự kiện scroll cho window
window.onscroll = () => {
  navbar.classList.remove("active");
  userBox.classList.remove("active");
};

// Định nghĩa sự kiện click cho nút user
userBtn.onclick = () => {
  userBox.classList.toggle("active");
  navbar.classList.remove("active");
};
