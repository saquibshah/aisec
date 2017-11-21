<?php if (AppManager::isLoggedIn() && AppManager::isSolvedQr()) { ?>
<div class="col-md-2" id="left_side_bar">
    <ul>
        <li><a href="home.php">NEWS</a></li>
        
        <li><a href="javascript:void(0)" onclick="$(this).next().slideToggle();$(this).find('span').toggle();">
                Departments
                <span style="float:right;display: none;" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                <span style="float:right; " class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
            <ul style="display: none;">
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/UnderMaintenance.php&page=phd">PHD</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/UnderMaintenance.php&page=hdd">HHD</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/UnderMaintenance.php&page=vddvirus">VDD Virus</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/UnderMaintenance.php&page=wcdworm">WCD Worm</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/UnderMaintenance.php&page=fadforensicanalysis">FAD Forensic Analysis</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/UnderMaintenance.php&page=webhacking">Web Hacking</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/UnderMaintenance.php&page=mobilehacking">Mobile Hacking</a></li>
            </ul>
        </li>
        
        <li>
            <a href="javascript:void(0)" onclick="$(this).next().slideToggle();$(this).find('span').toggle();">
                Projects
                <span style="float:right;display: none;" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                <span style="float:right;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
            <ul style="display: none;">
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/Projects/Stuxnet.php">Stuxnet</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/Projects/Flame.php">Flame</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/UnderMaintenance.php&page=water">Water</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/Projects/Duqu.php">Duqu</a></li>
            </ul>
        </li>
        
        <li>
            <a href="javascript:void(0)" onclick="$(this).next().slideToggle();$(this).find('span').toggle();">
                Employee Services
                <span style="float:right; display: none;" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                <span style="float:right;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
            <ul style="display: none;">
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/Employee%20Services/Carsharing.php">Carsharing</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/Employee%20Services/Betting%20system.php">Betting System</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/Employee%20Services/ComplaintPortal.php">Complaint Portal</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)" onclick="$(this).next().slideToggle();$(this).find('span').toggle();">
                Administration
                <span style="float:right;display: none;" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                <span style="float:right;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
            <ul style="display: none;">
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/Administration/HiringNewPeople.php">Hiring new ppl</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/Administration/Timesheet.php">Timesheet ZEB</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/Administration/Vacation.php">Vacation</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/Administration/Travelling.php">Traveling</a></li>
        <?php if (AppManager::getValue('username') == 'james') { ?>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=Hiring.php">Human Resources</a></li>
        <?php } ?>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)" onclick="$(this).next().slideToggle();$(this).find('span').toggle();">
                ISM Services
                <span style="float:right;display: none;" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                <span style="float:right;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
            <ul style="display: none;">
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/ISM%20Services/AddressBook.php">Adressbook</a></li>
        <!----><li class="child-level1-navi"><a href="displaycontent.php?file=contents/ISM%20Services/HelpDesk.php">Helpdesk</a></li>
            </ul>
        </li>
        <br/><hr style="margin-top: 0px;"/>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
<?php } ?>