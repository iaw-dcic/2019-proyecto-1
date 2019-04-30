    <form name="modifyProfile" id="profileForm" novalidate>
                <!-- Inicio del div central parte de formulario información básica -->
                <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
                    <div class="col-md-8 col-md-offset-2">
                        
                            <div class="control-group form-group">
                                <div class="controls">
                                    <br >
                                    <label>Información básica</label>
                                    <span id="alertName" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                                        <input type="text" class="form-control" id="txtName" placeholder="Introduzca su nombre" required data-validation-required-message="Por favor introduzca su nomnbre.">
                                    </span>
                                    <br >
                                    <span id="alertSurname" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                                        <input type="text" class="form-control" id="txtSurname" placeholder="Introduzca sus apellidos" required data-validation-required-message="Por favor introduzca sus apellidos.">
                                    </span>
                                    <br >
                                    <span id="alertQualification" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                                        <input type="text" class="form-control" id="txtQualification" placeholder="Introduzca su título" required data-validation-required-message="Por favor introduzca su título.">
                                    </span>
                                    <br >
                                    <span id="alertEmail" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                                        <input type="email" class="form-control" id="txtEmail" placeholder="Introduzca su email" required data-validation-required-message="Por favor introduzca su email.">
                                    </span>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Biografía:</label>
                                    <span id="alertBiography" data-toggle="popover" data-trigger="hover" data-placement="auto" title="" data-content="">
                                        <textarea rows="6" cols="30" class="form-control" id="txtBiography" required maxlength="999" style="resize:none" 
                                        data-validation-required-message="Por favor introduzca su biografía deseada."></textarea>
                                    </span>
                                    <br >
                                <!--
                                    <span id="alertSelectLanguage" data-toggle="popover" data-trigger="hover" data-placement="auto" title="" data-content="">
                                        <select class="form-control" id="selectLanguage" title="Seleccione su idioma">
                                            <option class="bs-title-option" value="" disabled selected>Elija un idioma</option>
                                            <option>Alemán</option>
                                            <option>Castellano</option>
                                            <option>Catalán</option>
                                            <option>Francés</option>
                                            <option>Inglés</option>
                                            <option>Portugués</option>
                                        </select>
                                    </span>
                                -->
                                    <br >
                                     <!-- Botones formulario -->
                                    <div class="col-md-12 container allFormButtons">                 
                                        <div class="col-md-5 col-md-offset-3">
                                            <div class="form-group">
                                                    <button type="submit" id="btnEnviar" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                            &nbsp;
                                    </div>
                                    <!-- Fin botones formulario --> 
                                </div>
                            </div>
                    </div>
                </div>
                <!-- Fin del div central parte de formulario información básica -->
                 
                
                </form>
                <!-- Fin del form -->