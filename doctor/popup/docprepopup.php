<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.buttons{
  margin-left:720px;
}

.modbutton {
  width: 100px;
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  padding: 14px 22px;
  border: none;
  background: #0e6680;
  border-radius: 6px;
  cursor: pointer;
}

.modbutton:hover {
  background-color: #0D5C75;
}

.modal-box {
  display: block;
  position: fixed;
  left: 50%;
  top: 50%;
  height: 80vh;
  width: 75vh;
  transform: translate(-40%, -50%);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  z-index: 9999; /* Set a higher z-index than the rest of the page */
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.3);
  opacity: 0;
  pointer-events: none;
  filter: blur(8px);
  backdrop-filter: blur(8px);
  z-index: 9998; /* Set a lower z-index than the modal-box */
}


section.active .overlay {
  opacity: 1;
  pointer-events: auto;
}

.modal-box {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 20px 0 0 20px;
  border-radius: 50px;
  background-color: #fff;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
  transform: translate(-40%, -50%) scale(1.2);
  
}

section.active .modal-box {
  opacity: 1;
  pointer-events: auto;
  transform: translate(-40%, -50%) scale(1);
}

.modal-box i.fa-solid.fa-sack-dollar {
  font-size: 70px;
  color: #0e6680;
}

.modal-box h1 {
  margin-top: 30px;
  margin-left: 50px;
  font-size: 30px;
  font-weight: 700;
  color: #333;
}

.modal-box h2 {
  margin-top: 20px;
  font-size: 25px;
  font-weight: 500;
  color: #333;
}

.modal-box h3 {
  font-size: 16px;
  font-weight: 400;
  color: #333;
  text-align: center;
}

.modal-box .buttons {
  margin-top: 25px;
}

.modal-box button {
  font-size: 14px;
  padding: 6px 12px;
  margin: 0 10px;
}

.button {
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  padding: 14px 22px;
  border: none;
  background: #0e6680;
  border-radius: 6px;
  cursor: pointer;
}

.button:hover {
  background-color: #0D5C75;
}

.cont{
  justify-content: center;
  align-items: center;
  margin-left:-20px;
  width: 90%;
  height: 65vh;
}
</style>

<section class="active">
    <span class="overlay"></span>

    <div class="modal-box">
        <img src="../images/docprescription/Order_06_02_23_08_56_41_PM.jpeg" alt="Prescription Loading Failed :(" class="cont">
        <button class="modbutton close-btn" style="margin-top: 10px;">Close</button>
    </div>
</section>

<script>
function openPopup() {
  const section = document.getElementById("uploadOR");
  section.classList.add("active");
}

const overlay = document.querySelector(".overlay"),
closeBtn = document.querySelector(".close-btn");

function closePopup() {
const section = document.querySelector("section");
section.classList.remove("active");
}

closeBtn.addEventListener("click", closePopup);
overlay.addEventListener("click", closePopup);
</script>