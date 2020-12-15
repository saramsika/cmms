 <!-- The Modal -->
 
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter une intervention</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
               <form action="interventionform.php" method="post"  class="login-form" > 

                <ul><div class="form-group">
                    <h6>Date :</h6><input name="date" data-date-format="dd/mm/yyyy" id="datepicker">
                 </div></ul>

              <ul><div class="form-group">
                      <label for="exampleFormControlSelect1" > <h6>Type d'intervention :</h6></label>
                      <select class="form-control" name="type" id="exampleFormControlSelect1">
                        <option>préventive</option>
                        <option>curative</option>
                 </select></div></ul>

               
                 <ul><div class="form-group">
                    <h6>Reference du matériel :</h6> <input   type = "text" name = "refmat"><br />
                 </div></ul>

                  <ul><div class="form-group">
                      <h6>Observation :</h6> <input   type = "text" name = "obs"><br />
                 </div></ul>
                
  
                  <ul><div class="form-group"> 
                     <h6>Code de la pièce:</h6> <input  type = "text" name = "codep"><br />
                 </div></ul>

                  <ul><div class="form-group"> 
                     <h6>Nombres des pièces:</h6> <input  type = "text" name = "nbp"><br />
                 </div></ul>

                  <ul><div class="form-group"> 
                     <h6>Code Huile:</h6> <input  type = "text" name = "cdh"><br />
                 </div></ul>

                  <ul><div class="form-group"> 
                     <h6>Quantité de litres:</h6> <input  type = "text" name = "qtl"><br />
                 </div></ul>

                
                   <div class="modal-footer">
          
            <input class="btn btn-danger btn-primary" type = "submit" value = "Envoyer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                
        
      </div>
     
       </form>


        </div>
        
      
      
    </div>
  </div>
  