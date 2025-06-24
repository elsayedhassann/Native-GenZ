const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});
document.getElementById("togglepw").addEventListener("change",function(){
  var passwordinput = document.getElementById("pw");
  if (this.checked) {
    passwordinput.type= "text";
  }
  else{
    passwordinput.type= "password";
  }
});
document.getElementById("togglepc").addEventListener("change",function(){
  var passwordinput = document.getElementById("pc");
  if (this.checked) {
    passwordinput.type= "text";
  }
  else{
    passwordinput.type= "password";
  }
});
document.getElementById("togglepassword").addEventListener("change",function(){
  var passwordinput = document.getElementById("password");
  if (this.checked) {
    passwordinput.type= "text";
  }
  else{
    passwordinput.type= "password";
  }
});