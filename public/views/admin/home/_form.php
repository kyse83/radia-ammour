<form action="home" method ="POST" enctype="multipart/form-data">
   
    <div class="row">
            <div class="col-md-9">
                <?= $form->file('image','Image affichée 1');?>
                <input type='submit' name="submit1" class="btn btn-primary"></input>
            </div>
            <div class="col-md-3">
                
                <img src="/uploads/home/image1_small.jpg" alt="" style= "width: 150px;">
                
            </div>
        </div>
    
</form>
<form action="home" method ="POST" enctype="multipart/form-data">
   
    <div class="row">
            <div class="col-md-9">
                <?= $form->file('image','Image affichée 2');?>
                <input type='submit' name="submit2" class="btn btn-primary"></input>
            </div>
            <div class="col-md-3">
                    <img src="/uploads/home/image2_small.jpg" alt="" style= "width: 150px;">
            </div>
        </div>
    
</form>
<form action="home" method ="POST" enctype="multipart/form-data">
   
    <div class="row">
            <div class="col-md-9">
                <?= $form->file('image','Image affichée 3');?>
                <input type='submit' name="submit3" class="btn btn-primary"></input>
            </div>
            <div class="col-md-3">
                    <img src="/uploads/home/image3_small.jpg" alt="" style= "width: 150px;">
            </div>
        </div>
    
</form>
