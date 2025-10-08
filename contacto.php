<?php
// Incluir la conexión
include("db/Conexion.php");

// Validar que el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = $_POST['nombre'];
    $correo   = $_POST['email'];
    $telefono = $_POST['telefono'];
    $asunto   = $_POST['asunto'];
    $mensaje  = $_POST['mensaje'];

    // Preparar consulta (SQL Injection seguro)
    $stmt = $conn->prepare("INSERT INTO formulario (nombre, correo, telefono, asunto, mensaje) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $correo, $telefono, $asunto, $mensaje);

    if ($stmt->execute()) {
      $msg = "✅ Tu mensaje se envió correctamente.";
      echo "<script>document.addEventListener('DOMContentLoaded', function(){ var m = " . json_encode($msg) . ";
      var d = document.createElement('div');
      d.textContent = m;
      Object.assign(d.style, {position:'fixed', left:'50%', top:'20px', transform:'translateX(-50%)', background:'#1f2937', color:'#fff', padding:'12px 18px', borderRadius:'6px', zIndex:9999, fontSize:'16px', boxShadow:'0 2px 10px rgba(0,0,0,0.2)'});
      document.body.appendChild(d);
      setTimeout(function(){
        try { window.close(); } catch(e) {}
        setTimeout(function(){
        if (!window.closed) { window.location = 'Inicio.php'; }
        }, 200);
      }, 3000);
      });</script>";
    } else {
      $err = "❌ Error: " . $stmt->error;
      echo "<script>document.addEventListener('DOMContentLoaded', function(){ var m = " . json_encode($err) . ";
      var d = document.createElement('div');
      d.textContent = m;
      Object.assign(d.style, {position:'fixed', left:'50%', top:'20px', transform:'translateX(-50%)', background:'#7f1d1d', color:'#fff', padding:'12px 18px', borderRadius:'6px', zIndex:9999, fontSize:'16px', boxShadow:'0 2px 10px rgba(0,0,0,0.2)'});
      document.body.appendChild(d);
      setTimeout(function(){
        try { window.close(); } catch(e) {}
        setTimeout(function(){
        if (!window.closed) { window.location = 'Inicio.php'; }
        }, 200);
      }, 3000);
      });</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Gmail_icon_%282020%29.svg/1200px-Gmail_icon_%282020%29.svg.png" type="image/x-icon">
  <title>Contáctanos</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
    body { display: flex; flex-direction: column; min-height: 100vh; background:#f3f4f6; }


    @media (max-width: 640px) {
      .form-grid { grid-template-columns: 1fr; }
      .actions { flex-direction: column-reverse; align-items: stretch; }
    }
  </style>
</head>
<body> 
  <?php include("menu.php"); ?>

  <!-- Contenido -->
  <main>
    <style>
      :root{
        --bg:#f3f4f6;
        --card:#ffffff;
        --primary:#1e40af;
        --accent:#f97316;
        --muted:#6b7280;
        --danger:#7f1d1d;
        --radius:12px;
      }
      .page-wrap{
        display:flex;
        justify-content:center;
        align-items:flex-start;
        padding:40px 20px;
        background:linear-gradient(180deg, rgba(30,58,138,0.04), transparent 40%), var(--bg);
        min-height:calc(100vh - 140px);
      }
      .contact-card{
        width:100%;
        max-width:980px;
        background:var(--card);
        border-radius:var(--radius);
        box-shadow:0 8px 30px rgba(2,6,23,0.08);
        padding:28px;
        overflow:hidden;
        display:grid;
        grid-template-columns: 1fr 420px;
        gap:24px;
      }

      .contact-card .intro{
        padding-right:6px;
      }
      .contact-card h2{
        margin-bottom:8px;
        color:var(--primary);
        font-size:22px;
      }
      .contact-card p.lead{
        color:var(--muted);
        margin-bottom:18px;
        line-height:1.5;
      }

      .contact-info{
        background:linear-gradient(135deg, rgba(30,58,138,0.06), rgba(249,115,22,0.03));
        padding:18px;
        border-radius:10px;
        color:var(--muted);
        font-size:14px;
      }
      .contact-info b{color:var(--primary)}
      .contact-info .row{display:flex;gap:8px;align-items:center;margin-bottom:8px}

      form.contact-form{
        background:transparent;
      }
      .form-grid{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:12px;
        margin-bottom:14px;
      }
      .form-group{display:flex;flex-direction:column; gap:6px;}
      .form-group label{font-size:13px;color:var(--muted)}
      .form-group input,
      .form-group textarea{
        padding:10px 12px;
        border-radius:10px;
        border:1px solid #e6e9ee;
        background:#fff;
        font-size:14px;
        outline:none;
        transition:box-shadow .15s, border-color .15s, transform .05s;
      }
      .form-group input:focus,
      .form-group textarea:focus{
        border-color:var(--primary);
        box-shadow:0 6px 18px rgba(30,58,138,0.08);
      }
      textarea{min-height:140px; resize:vertical; max-height:320px}
      .hint{font-size:12px;color:var(--muted); margin-top:6px}

      .actions{
        display:flex;
        gap:12px;
        justify-content:flex-end;
        align-items:center;
        margin-top:6px;
      }
      .btn{
        padding:10px 16px;
        border-radius:10px;
        font-weight:600;
        cursor:pointer;
        border:0;
        transition:transform .08s, box-shadow .12s, opacity .12s;
      }
      .btn:active{transform:translateY(1px)}
      .btn-primary{
        background:linear-gradient(90deg,var(--primary), #153a8a);
        color:#fff;
        box-shadow:0 6px 18px rgba(30,58,138,0.12);
      }
      .btn-secondary{
        background:#fff;
        border:1px solid #e6e9ee;
        color:var(--muted);
      }

      .meta{
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:12px;
        margin-top:8px;
        font-size:13px;
        color:var(--muted);
      }

      /* Responsive */
      @media (max-width:980px){
        .contact-card{grid-template-columns:1fr}
      }
      @media (max-width:640px){
        .page-wrap{padding:20px 12px}
        .form-grid{grid-template-columns:1fr}
        .actions{flex-direction:column-reverse; align-items:stretch}
      }
    </style>

    <div class="page-wrap">
      <div class="contact-card" role="region" aria-label="Formulario de contacto">
        <div class="intro">
          <h2>Contáctanos</h2>
          <p class="lead">¿Tienes dudas, propuestas o quieres una cotización? Completa el formulario y te respondemos en menos de 48 horas.</p>

          <div class="contact-info" aria-hidden="false">
            <div class="row"><span>🏢</span><div><b>Oficina:</b> Calle Falsa 123, Bogotá</div></div>
            <div class="row"><span>📧</span><div><b>Email:</b> contacto@miweb.com</div></div>
            <div class="row"><span>📞</span><div><b>Teléfono:</b> +57 300 000 0000</div></div>
            <div style="margin-top:8px;font-size:13px;color:var(--muted)">Horario de atención: Lun - Vie, 9:00 - 18:00</div>
          </div>
        </div>

        <form class="contact-form" action="contacto.php" method="post" novalidate>
          <div class="form-grid" aria-hidden="false">
            <div class="form-group">
              <label for="nombre">Nombre completo</label>
              <input id="nombre" name="nombre" type="text" placeholder="Tu nombre" required>
            </div>

            <div class="form-group">
              <label for="email">Correo electrónico</label>
              <input id="email" name="email" type="email" placeholder="tucorreo@ejemplo.com" required>
            </div>

            <div class="form-group">
              <label for="telefono">Teléfono (opcional)</label>
              <input id="telefono" name="telefono" type="text" placeholder="+57 600 000 0000" inputmode="tel">
            </div>

            <div class="form-group">
              <label for="asunto">Asunto</label>
              <input id="asunto" name="asunto" type="text" placeholder="Breve resumen" required>
            </div>

            <div class="form-group" style="grid-column: 1 / -1;">
              <label for="mensaje">Mensaje</label>
              <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje..." required maxlength="2000"></textarea>
              <div class="meta">
                <div class="hint">Máximo 2000 caracteres.</div>
                <div id="counter" aria-live="polite">0 / 2000</div>
              </div>
            </div>
          </div>

          <div class="actions">
            <button type="reset" class="btn btn-secondary" id="resetBtn">Limpiar</button>
            <button type="submit" class="btn btn-primary" id="submitBtn">Enviar mensaje</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Footer -->
    <?php include("Footer.php"); ?>

    <script>
      (function(){
        var mensaje = document.getElementById('mensaje');
        var counter = document.getElementById('counter');
        var form = document.querySelector('.contact-form');
        var submit = document.getElementById('submitBtn');

        function updateCount(){
          var len = mensaje.value.length;
          counter.textContent = len + ' / ' + (mensaje.maxLength || 2000);
          if(len > (mensaje.maxLength - 20)){
            counter.style.color = '#b45309';
          } else {
            counter.style.color = '';
          }
        }
        mensaje.addEventListener('input', updateCount);
        updateCount();

        // simple client-side validation feedback
        form.addEventListener('submit', function(e){
          if(!form.checkValidity()){
            e.preventDefault();
            // focus first invalid
            var firstInvalid = form.querySelector(':invalid');
            if(firstInvalid) firstInvalid.focus();
            // visual hint
            submit.textContent = 'Corrige los campos';
            setTimeout(function(){ submit.textContent = 'Enviar mensaje'; }, 1800);
          } else {
            // prevent double submit UX: disable button briefly while submitting
            submit.disabled = true;
            submit.style.opacity = '.7';
            setTimeout(function(){ submit.disabled = false; submit.style.opacity = ''; }, 3000);
          }
        });

        // reset handler
        document.getElementById('resetBtn').addEventListener('click', function(){
          setTimeout(updateCount, 10);
        });
      })();
    </script>
  </main>
