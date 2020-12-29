<div class="container mt-2">
        <table class="table rounded text-center table-dark m-auto">
            <thead>
                <tr>
                    <th>noserv</th>
                    <th>service</th>
                    <th>ville</th>
                </tr>
            </thead>
            <tbody>
                <tr>  
                    <td><?= $dataSOS['noserv'] ?></td>
                    <td><?= $dataSOS['service'] ?></td>
                    <td><?php echo $dataSOS['ville'] ?></td>
                </tr>
            </tbody>
        </table> 
    </br>
        <div class="row ">
            <div class="col-12 text-center mb-">
                <a href='indexServ.php' class='text-white'>
                    <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour</button>
                </a>
            </div>
        </div>
</div>