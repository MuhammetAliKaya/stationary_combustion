<div class="middlesection">
    <div class="container">
        <div class="formboxsec">
            <form id="stationaryCombustionForm" method="POST" action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="formtitle">
                            <h3>GİRDİ ALANI</h3>
                            <p>Lütfen salınım değerlerini hesaplamak için aşağıdaki alanları doldurun:
                            </p>
                        </div>
                        heree

                        <div class="alaniform formmaxwid" id="inputArea">
                            <div class="mb-3" id="facilty_area">
                                <label class="form-label">Facilty ID</label>
                                <div class="selct-dropdown fullwidthselectbox selroundbox" id="facilty">
                                    <select name="facility_id" id="facility_id">
                                        <option value="0">Seçiniz</option>
                                        @foreach($faciltys as $facilty)
                                        <option value="{{ $facilty->facilty_id }}">
                                            {{ $facilty->facilty_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Year</label>
                                <div class="selct-dropdown fullwidthselectbox selroundbox">
                                    <select name="year" id="year">
                                        <option value="0">Seçiniz</option>
                                        @foreach($years as $year)
                                        <option value="{{ $year->year }}">
                                            {{ $year->year }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fuel</label>
                                <div class="selct-dropdown fullwidthselectbox selroundbox">
                                    <select name="fuel" id="fuel">
                                        <option value="0">Seçiniz</option>
                                        @foreach($fuels as $fuel)
                                        <option value="{{ $fuel->id }}">
                                            {{ $fuel->fuel_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Amount of fuel</label>
                                <div>
                                    <div class="selroundbox amountoffuelbox">
                                        <div class="inputselectflex">
                                            <div class="griinput">
                                                <input name="amount_of_fuel" class="borinput" id="amount_of_fuel"
                                                    type="text" name="" placeholder="Giriniz">
                                            </div>
                                            <div class="selct-dropdown fullwidthselectbox">
                                                <label class="form-label">Units</label>
                                                <select name="unit" id="units">
                                                    <option value="0">Seçiniz</option>
                                                    @foreach($units as $unit)
                                                    <option value="{{ $unit->id }}">
                                                        {{ $unit->unit_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rightformPL">
                            <div class="formtitle">
                                <h3>SONUÇ ALANI</h3>
                                <p>Girdi Alanı'nda girdiğiniz değerlere göre salınan gaz miktarları
                                    aşağıdaki gibidir:</p>
                            </div>
                            <div class="sonucalaniformlist" id="resaultArea">
                                <ul>
                                    <li>
                                        <div>
                                            <span>CO<sub>2</sub></span>
                                            <input type="text" name="CO2" id="co2" placeholder="" readonly>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>CH<sub>4</sub></span>
                                            <input type="text" name="CH4" id="ch4" placeholder="" readonly>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>N<sub>2</sub>O</span>
                                            <input type="text" name="N2O" id="n2o" placeholder="" readonly>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>CO<sub>2</sub><sup>e</sup></span>
                                            <input type="text" name="CO2E" id="co2e" placeholder="" readonly>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="sublinkbnt">
                                <input type="button" id="resetDataConfirmBtn" name="Sıfırla" value="Sıfırla">
                                <input type="button" id="storeFormData" name="Kaydet" value="Kaydet">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="formtablesec">
            <h4>Hesaplamalar</h4>
            <div class="table-responsive fortab samwd">
                <table id="storeDataTable" class="table table-bordered cstmTable basicTable cusrmrTable tablehovetr">
                    <thead>
                        <tr>
                            <th class="smw fnt14">Facilty ID</th>
                            <th class="fnt14">Year</th>
                            <th class="fnt14">Fuel</th>
                            <th class="lefttext fnt14">Amount of <br>Fuel</th>
                            <th class="fnt14">Units</th>
                            <th class="fnt15"><span>CO<sub>2</sub></span></th>
                            <th class="fnt15"><span>CH<sub>4</sub></span></th>
                            <th class="fnt15"><span>N<sub>2</sub>O</span></th>
                            <th class="fnt15"><span>CO<sub>2</sub><sup>e</sup></span></th>
                            <th class="smw">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="boxr" id="datatable">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>