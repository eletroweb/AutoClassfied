<div class="panel-body">
    <form role="form">
        <div class="form-group">
            <label for="cardNumber">
            Número do Cartão</label>
            <div class="input-group">
                <input type="text" class="form-control" id="cardNumber" placeholder="Digite um número válido"
                required autofocus />
                <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-7 col-md-7">
                <div class="form-group">
                    <label for="expityMonth">
                    EXPIRY DATE</label>
                    <div class="col-xs-6 col-lg-6 pl-ziro">
                        <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                    </div>
                    <div class="col-xs-6 col-lg-6 pl-ziro">
                        <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                    </div>
                </div>
                <div class="col-xs-5 col-md-5 pull-right">
                    <div class="form-group">
                        <label for="cvCode">
                        CV CODE</label>
                        <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                    </div>
                </div>
            </div>
        </form>
    </div>
<ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="#"><span class="badge pull-right"><span class="fa fa-dollar"></span>4200</span> Final Payment</a>
    </li>
</ul>
<br/>
<a href="http://www.jquery2dotnet.com" class="btn btn-success btn-lg btn-block" role="button">Efetuar pagamento</a>