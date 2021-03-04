<html>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> HOPITAL E2N</title>

<head>

</head>

<body>
    <div class="container">
        <br /><br /><br />

        <h3 align="center">rdv hosto</h3><br />
        <form method="post" action="<?php echo base_url() ?>appointments_controller/form_validation">
            <?php
            // On charge la library Form_validation
            $this->load->library('form_validation');

            // On verifie si l'url contient le segment 2 pour adapté le message
            if ($this->uri->segment(2) == "inserted") {
                //base url - http://localhost/tutorial/codeigniter  
                //redirect url - http://localhost/tutorial/codeigniter/main/inserted  
                //main - segment(1)  
                //inserted - segment(2)  
                echo '<p class="text-success">rdv ajouté avec succés</p>';
            }
            if ($this->uri->segment(2) == "updated") {
                echo '<p class="text-success">rdv modifé avec succés</p>';
            }
            ?>
            <!-- form -->
            <?php
            if (isset($user_data)) {
                foreach ($user_data->result() as $row) {
            ?>
                    <div class="form-group">
                        <label>datehour : </label>
                        <input type="text" name="dateHou" value="<?php echo $row->dateHou; ?>" class="form-control" />
                        <span class="text-danger"><?php echo form_error("dateHou"); ?></span>
                    </div>
                    <div class="form-group">
                        <label>idpatient : </label>
                        <input type="text" name="idPatients" value="<?php echo $row->idPatients; ?>" class="form-control" />
                        <span class="text-danger"><?php echo form_error("idPatients"); ?></span>
                    </div>
                    
                    <div class="form-group">
                        <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />
                        <input type="submit" name="update" value="Mettre a jour" class="btn btn-info" />
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="form-group">
                    <label>Datehour : </label>
                    <input type="text" name="dateHour" class="form-control" />
                    <span class="text-danger"><?php echo form_error("dateHour"); ?></span>
                </div>

                <div class="form-group">
                    <label>idPatients : </label>
                    <input type="text" name="idPatients" class="form-control" />
                    <span class="text-danger"><?php echo form_error("idPatients"); ?></span>
                </div>
               
                <div class="form-group">
                    <input type="submit" name="insert" value="Creer" class="btn btn-info" />
                </div>
            <?php
            }
            ?>
        </form>
        <br /><br />

        <!-- Tableau -->
        <h3>Liste des patients : </h3><br />
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>dateHour</th>
                    <th>Nom</th>
                    <th>Prénom</th>

                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
                <?php
                if ($fetch_data->num_rows() > 0) {
                    foreach ($fetch_data->result() as $row) {
                ?>
                        <tr>
                            <td><?php echo $row->dateHour; ?></td>
                            <td><?php echo $row->lastname; ?></td>
                            <td><?php echo $row->firstname; ?></td>

                            <!-- Bouton Suppr et Del -->
                            <td><a href="#" class="delete_data" id="<?php echo $row->id; ?>">Supprimer</a></td>
                            <td><a href="<?php echo base_url(); ?>appointments_controller/update_data/<?php echo $row->id; ?>">Modifier</a></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <!-- Message si table vide -->
                        <td colspan="5">No Data Found</td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <script>
            $(document).ready(function() {
                $('.delete_data').click(function() {
                    var id = $(this).attr("id");
                    if (confirm("Are you sure you want to delete this?")) {
                        window.location = "<?php echo base_url(); ?>add_patient/delete_data/" + id;
                    } else {
                        return false;
                    }
                });
            });
        </script>
    </div>
</body>

</html>