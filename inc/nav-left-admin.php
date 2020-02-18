<?php if ($_SESSION['privilegio']=='si') {
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-0">
          <!-- <img src="assets/img/logo.png" alt="" width="100%"> -->
        </div>
        <div class="sidebar-brand-text mx-3">   <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin Panel</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Modulos
      </div>

   
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Pacientes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="patients">Ver Pacientes</a>
            <a class="collapse-item" href="new-patient">Nuevo Paciente</a>
            
          </div>
          
        </div>

      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href=""></a>
            <a class="collapse-item" href=""></a>

            
          </div>
        </div>
          
      </li>

      <li class="nav-item">
          <a href="" class="nav-link"><i class="fas fa-clipboard-list"></i> </a>
          <a href="" class="nav-link"><i class="fas fa-clipboard-list"></i> </a>
          <a href="" class="nav-link"><i class="fas fa-clipboard-list"></i> </a>
          

        
      </li>

    </ul>
    
<?php  
}
else if ($_SESSION['privilegio']=='no') {
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-0">
          <!-- <img src="assets/img/logo.png" alt="" width="100%"> -->
        </div>
        <div class="sidebar-brand-text mx-3">   <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin Panel</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Modulos
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Recaudos</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="new-colletions">Nuevo Recaudo</a>
            
            
          </div>
          
        </div>

      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Pagos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            
            <a class="collapse-item" href="new-pay">Nuevo Pago</a>

            
          </div>
        </div>
          
      </li>
      <li class="nav-item">
        <a href="report-caja" class="nav-link" id=""><i class="fas fa-clipboard-list"></i> Reportes</a>
      </li>

      <li class="nav-item">
          <div id="cier">
            <a href="#" class="nav-link btn btn-success" id="cierre"><i class="fas fa-clipboard-list"></i> Cierre de Caja</a>
          </div>
          <script>
            document.getElementById('cierre').onclick = function(){
              var conf = confirm('Estas Seguro de Cerrar caja?');
              if (conf == true) {
                // document.getElementById('cierre').classList.remove('btn-succes');
                // document.getElementById('cier').classList.add('btn-danger');
                document.getElementById('cier').innerHTML = ('<a href="#" class="nav-link btn btn-danger" id=""><i class="fas fa-clipboard-list"></i> Cierre de Caja Exitoso</a>');
                alert('Se Generara El Reporte Del Dia.');
                location.href = ('close-day?export_data=true');
              }
                else{
                  
                }
            }
          </script>
          <!-- <a href="reports" class="nav-link"><i class="fas fa-clipboard-list"></i> Reportes</a> -->
          

        
      </li>

    </ul>
    
<?php  
}
?>
  