
<section id="encabezado" class="ocultar-encabezado">
<br><br><br>
<div class="fullscreen-container">
  <div class="content">
    <h1>Cirugía Plástica Meditada</h1>
  </div>
</div>
<br>
<style>
@keyframes fade {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.fullscreen-container {
  background-color: #183152;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
}

.content {
  text-align: center;
  box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
  padding: 20px;
  background-color: #2d4373;
  border-radius: 10px;
  transition: box-shadow 0.3s ease;
}

.content:hover {
  box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.4);
}

h1 {
  font-family: Arial, sans-serif;
  font-size: 36px;
  color: #ffffff;
  animation: fade 1s ease forwards;
}

/* Efecto de luz */
.fullscreen-container:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;

}
</style>
</section>