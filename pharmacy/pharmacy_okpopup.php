<?php 
    if(isset($_SESSION['med-respond1']))
    {
        ?>
        <section class="active">
            <span class="overlay"></span>

            <div class="modal-box">
                <i class="fa-regular fa-circle-check" style="color:green;"></i>
                <h2><?php echo $_SESSION['med-respond1']; ?></h2>

                <div class="buttons">
                <button class="close-btn button" style="background-color:green; color: #fff;">Ok, Close</button>
                </div>
            </div>
        </section>
        <?php
        unset($_SESSION['med-respond1']);

    }
    if(isset($_SESSION['nomed-respond1']))
    {
        ?>
        <section class="active">
            <span class="overlay"></span>

            <div class="modal-box">
            <i class="fa-regular fa-circle-xmark" style="color:red;"></i>
                <h2><?php echo $_SESSION['nomed-respond1']; ?></h2>

                <div class="buttons">
                <button class="close-btn button" style="background-color:red; color: #fff;">Ok, Close</button>
                </div>
            </div>
        </section>
        <?php
        unset($_SESSION['nomed-respond1']);

    }
?>

<!-- <section class="active">
  <span class="overlay"></span>

  <div class="modal-box">
    <i class="fa-regular fa-circle-check"></i>
    <h2>Completed</h2>
    <h3>You have successfully downloaded all the source code files.</h3>

    <div class="buttons">
      <button class="close-btn">Ok, Close</button>
    </div>
  </div>
</section> -->

<script>
    const section = document.querySelector("section"),
    overlay = document.querySelector(".overlay"),
    closeBtn = document.querySelector(".close-btn");

    overlay.addEventListener("click", () => section.classList.remove("active"));

    closeBtn.addEventListener("click", () => section.classList.remove("active"));

    section.classList.add("active");
    overlay.classList.add("active");
    document.querySelector(".modal-box").classList.add("active");
</script>

<style>
/* Google Fonts - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

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

.modal-box {
  display: block;
  position: fixed;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
/* .modal-box{
  display: block;
} */

.overlay {
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.3);
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s ease;
}

section.active .overlay {
  opacity: 1;
  pointer-events: auto;
}

.modal-box {
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 380px;
  width: 100%;
  padding: 30px 20px;
  border-radius: 24px;
  background-color: #fff;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
  transform: translate(-50%, -50%) scale(1.2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

section.active .modal-box {
  opacity: 1;
  pointer-events: auto;
  transform: translate(-50%, -50%) scale(1);
}

.modal-box i {
  font-size: 70px;
  color: #0e6680;
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

</style>

