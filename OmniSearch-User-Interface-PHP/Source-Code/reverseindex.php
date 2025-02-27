<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>OmniSearch</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/uitestnew/" style="padding: 5px">
				<img src="/uitestnew/images/logo.png" class="img-responsive" style="max-height: 40px"/>
			</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            
            <ul class="nav navbar-nav navbar-right">
			<li> <a href="index.php" class="btn btn-link btn-lg" role="button" style="background-color:rgb(255, 255, 100);color:black;font-size: 13px;height: 45px;opacity: 0.8;color:black;border: 1px solid rgb(79, 129, 98);font-weight: bold;text-decoration:none">Click here to search targets given a microRNA</a>
										</li>

                <li><a href="/uitestnew/about.php">About</a></li>
                <li><a href="/uitestnew/help.php">Help</a></li>
                <li><a href="/" target="_blank">Wiki/Feedback</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="header">
    <form id="search_form" autocomplete="off">
        <h2>Search for microRNAs given a target gene</h2>
        <div class="row">
		<p>
            <div class="col-md-2 col-sm-2"  >
                <div class="searchbox" style="width: 160px">
                    <label for="gene">
                        Enter Target Gene
                        <span class="glyphicon glyphicon-question-sign pull-right" style="color: yellow" data-toggle="tooltip" data-placement="left" data-container="body" title="Begin typing a complete gene name or part of such a name. Or simply press the down-arrow key without typing anything."></span>
                    </label>
                    <input id="gene" type="text" class="form-control" required autofocus/>
                    <div></div>
                </div>
            </div>
			
			<div class="col-md-3 col-sm-3">
                <div class="searchbox" style="width: 250px">
                    <label for="mirna">
                        Enter microRNA name(Optional)
                        <span class="glyphicon glyphicon-question-sign pull-right" style="color: yellow" data-toggle="tooltip" data-placement="left" title="Begin typing a complete microRNA name or part of such a name. Or simply press the down-arrow key without typing anything."></span>
                    </label>
                    <input id="mirna" type="text" class="form-control"  />
                    <div></div>
                </div>
            </div>
            
			<div class="col-md-3 col-sm-3">
                <div class="searchbox" style="width: 250px">
                    <label for="mesh">
                        Enter a MeSH Term (Optional)
                        <span class="glyphicon glyphicon-question-sign pull-right" style="color: yellow" data-toggle="tooltip" data-placement="left" title="Begin typing a complete MeSH Term or part of such a term. Or simply press the down-arrow key without typing anything."></span>
                    </label>
                    <input id="mesh" type="text" class="form-control" />
                    <div></div>
                </div>
            </div>
             

            <div class="col-md-2 col-sm-2">
                <label style="display: block">&nbsp;
                    <span class="glyphicon glyphicon-question-sign pull-right" style="color: yellow" data-toggle="tooltip" data-placement="left" data-container="body" title="Click the button below to change various filters."></span>
                </label>
                <button id="filter_btn" type="button" style="width: 160px" class="btn btn-default btn-block" onclick="$('#analysis_panel').hide(); $('#download_panel').hide(); $('#filter_panel').toggle()">
                    <span class="glyphicon glyphicon-filter"></span><span> Filters</span>
                </button>
            </div>
            <div class="col-md-2 col-sm-2">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-default btn-block">
                    <span class="glyphicon glyphicon-search"></span><span> Search</span>
                </button>
            </div>
			</p>
        </div>
    </form>

    <div id="result_controls">
        <a id="rna_central_link" href="" target="_blank" class="btn btn-default">
            <span class="glyphicon glyphicon-link"></span> Gene Ontology Annotation
        </a>
        
        <button class="btn btn-default" type="button" onclick="$('#filter_panel').hide(); $('#analysis_panel').hide(); $('#download_panel').toggle()">
            <span class="glyphicon glyphicon-download-alt"></span> Download Results
        </button>
		<a href="reverseindex.php" 	<button class="btn btn-default" type="button" onclick="reset()">
            <span class="glyphicon glyphicon-remove"></span> Clear Results
        </button> </a>
    </div>
</div>
<div id="wrapper">
    <div id="filter_panel" class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Data Source Filter</th>
                <th>Validation Filter</th>
                <th>Publications Filter</th>
				<th>Mesh Filter</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="database_filter" value="mirdb" autocomplete="off" checked>miRDB</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="database_filter" value="targetscan" autocomplete="off" checked>TargetScan</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="database_filter" value="miranda" autocomplete="off" checked>miRanda</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="database_filter" value="mirtarbase" autocomplete="off" checked>miRTarBase</label>
                        </div>
                    </div>
                </td>
                <td rowspan="2">
                    <div>
                        <div class="radio">
                            <label><input type="radio" name="validation_filter" value="all" autocomplete="off" checked>Show All</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="validation_filter" value="predicted" autocomplete="off">Show Predicted miRNAs Only</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="validation_filter" value="validated" autocomplete="off">Show Validated miRNAs Only</label>
                        </div>
                    </div>
                </td>
                <td rowspan="2">
                    <div>
                        <div class="radio">
                            <label><input type="radio" name="pubmed_filter" value="all" autocomplete="off" checked>Show All</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="pubmed_filter" value="no" autocomplete="off">Without Publications</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="pubmed_filter" value="has" autocomplete="off">With Publications</label>
                        </div>
                    </div>
                </td>
				<td rowspan="2">
                    <div>
                        <div class="radio">
                            <label><input type="radio" name="mesh_filter" value="exact" autocomplete="off" checked>Exact Match</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="mesh_filter" value="broader" autocomplete="off">Broader Match</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="mesh_filter" value="narrow" autocomplete="off">Narrower Match</label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <div class="radio">
                            <label><input type="radio" name="database_operator" value="any" autocomplete="off" checked>Show miRNAs appearing in ANY selected source</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="database_operator" value="all" autocomplete="off">Show miRNAs appearing in ALL selected sources</label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <button id="apply_btn" type="button" class="btn btn-default" onclick="applyFilters()" autocomplete="off" disabled>Apply Selected Filters</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="download_panel" class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="50%">Selection</th>
                <th width="50%">File Format</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div>
                        <div class="radio">
                            <label><input type="radio" name="download_radio" value="all" autocomplete="off" checked>Download the whole table (<span id="download_all_lbl">0</span>)</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="download_radio" value="partial" autocomplete="off" disabled>Download the partial table with selected microRNAs (<span id="download_partial_lbl">0</span>)</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="download_radio" value="selected" autocomplete="off" disabled>Download selected microRNAs only (<span id="download_selected_lbl">0</span>)</label>
                        </div>
                    </div>
                </td>
                <td>
                    <div>
                        <div class="radio">
                            <label><input type="radio" name="format_radio" value="tsv" autocomplete="off" checked>Tab-delimited text</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="format_radio" value="csv" autocomplete="off">CSV format</label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button id="download_btn1" class="btn btn-default" type="button" >Download</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    
    <div id="error_panel"></div>
    <div id="content">
        <div id="page_controls" class="row">
            <div class="col-md-2 col-sm-2">
                <label for="rows_select">Rows per page</label>
                <select id="rows_select" class="form-control" style="width: 100%" autocomplete="off">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100" selected>100</option>
                    <option value="all">All</option>
                </select>
            </div>
            <div class="col-md-8 col-sm-8" style="text-align: center">
                <label><span id="total_span"></span></label>
                <nav>
                    <ul class="pagination">
                        <li><button id="first_btn" type="button" onclick="first()">&laquo;</button></li>
                        <li><button id="prev_btn" type="button"  onclick="prev()">&lsaquo;</button></li>
                        <li><label>Page <span id="page_span">0</span> of <span id="pages_span">0</span></label></li>
                        <li><button id="next_btn" type="button"  onclick="next()">&rsaquo;</button></li>
                        <li><button id="last_btn" type="button"  onclick="last()">&raquo;</button></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-2 col-sm-2">
                <form id="goto_page_form" autocomplete="off">
                    <label for="page_input">Go to Page</label>
                    <div class="input-group">
                        <input id="page_input" type="text" class="form-control" required/>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div id="table_div" class="table-responsive">
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="reversenew.js"></script>




</body>
</html>