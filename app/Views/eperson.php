<style>
    .card{
        border: 1px solid #ccc;
        width: 500px;
        border-radius: 10px;
        height: 600px;
    }
    .card-header{
        display: flex;
        justify-content: space-evenly;
        flex-direction: column;
        align-items: center;
    }
    .card-header {
        font-family: "Helvetica Neue",Helvetica, Arial, sans-serif;
    }
    .card-footer{
        display: flex;
        justify-content: space-evenly;
        flex-direction: column;
        align-items: center;
    }
    .card-body{
        display: flex;
        justify-content: space-evenly;
        flex-direction: column;
        align-items: center;
    }
    .card-item{
        display: grid;
        grid-template-columns: 2fr 1fr;
    }
    .card-info{
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
    }
    label{
        font-weight: bold;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 90%;
    }
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>




<div class="card">
    <div class="card-header">
        <h2>Bot TradUnilab</h2>
        <span>Notificações</span>
    </div>
    <div class="card-body">
        <h4>Informações do usuário que realizou a submissão</h4>
        <div class="card-info">
            <p class="card-item">
                <label>Nome:</label>
                <span>Lucas Silva</span>
            </p>
            <p class="card-item">
                <label>Matricula:</label>
                <span>23232</span>
            </p>
            <p class="card-item">
                <label>Email:</label>
                <span>asda@gmail.com</span>
            </p>
            <p class="card-item">
                <label>Data Submissão:</label>
                <span>02/02/2020</span>
            </p>
        </div>
    </div>
    <div class="card-footer">
        <p>Para mais informações acesse <a href="http://">TradUnilab</a>.
    </div>
</div>