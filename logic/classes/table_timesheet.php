<div class="table-responsive mCustomScrollbar" data-mcs-theme="dark">
    <table class="table table-striped table-bordered table-hover table-condensed"
           id="table_naw"
           data-show-export="true"
           data-mobile-responsive="true"
    ">
    <thead>
    <tr>
        <th data-field="assemblage" data-sortable="false">Assemblage</th>
        <th data-field="maandag" data-sortable="false">Maandag / (<?php echo date('m/d/Y', strtotime("+1 day")); ?>)</th>
        <th data-field="dinsdag" data-sortable="false">Dinsdag / (<?php echo date('m/d/Y', strtotime("+2 days")); ?>)</th>
        <th data-field="woensdag" data-sortable="false">Woensdag / (<?php echo date('m/d/Y', strtotime("+3 days")); ?>)</th>
        <th data-field="donderdag" data-sortable="false">Donderdag / (<?php echo date('m/d/Y', strtotime("+4 days")); ?>)</th>
        <th data-field="vrijdag" data-sortable="false">Vrijdag / (<?php echo date('m/d/Y', strtotime("+5 days")); ?>)</th>
    </tr>
    <tr>
        <th data-field="" data-sortable="false"></th>
        <th data-field="maandag_tijd" data-sortable="false">Tijd / Aantal</th>
        <th data-field="maandag_aantal" data-sortable="false">Tijd / Aantal</th>
        <th data-field="dinsdag_tijd" data-sortable="false">Tijd / Aantal</th>
        <th data-field="dinsdag_aantal" data-sortable="false">Tijd / Aantal</th>
        <th data-field="tussenvoegsel" data-sortable="false">Tijd / Aantal</th>
    </tr>
    </thead>
    <tbody>
    <tr align="center">
        <td>Komen</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Gaan</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Productieorder</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Fase I</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Fase II</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Fase III</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Carton snijden</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Werkvoorbereiding</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Opruimen</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Extern transport</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Meeting</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    <tr align="center">
        <td>Administratie</td>
        <td>
            <input type="text" name="maandag_komen_tijd" class="timesheet_input" id="inputMaandag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputMaandag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="dinsdag_komen_tijd" class="timesheet_input" id="inputDinsdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="maandag_komen_aantal" class="timesheet_input" id="inputDinsdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="woensdag_komen_tijd" class="timesheet_input" id="inputWoensdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="woensdag_komen_aantal" class="timesheet_input" id="inputWoensdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="donderdag_komen_tijd" class="timesheet_input" id="inputDonderdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="donderdag_komen_aantal" class="timesheet_input" id="inputDonderdag_komen_aantal"
                   placeholder="Aantal">
        </td>
        <td>
            <input type="text" name="vrijdag_komen_tijd" class="timesheet_input" id="inputVrijdag_komen_tijd"
                   placeholder="Tijd">
            <input type="text" name="vrijdag_komen_aantal" class="timesheet_input" id="inputVrijdag_komen_aantal"
                   placeholder="Aantal">
        </td>
    </tr>
    </tbody>
    </table>
    <button type="submit" class="btn btn-submit">Opslaan</button>
</div>