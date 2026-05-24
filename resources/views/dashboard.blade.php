<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome — Module 1 ERD Interface</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <style>
        :root {
            --bg-main: #fcf6f5;
            --sidebar-bg: #802c46;
            --sidebar-text: #f0d5db;
            --sidebar-active: #5c1e31;
            --panel-bg: #ffffff;
            --text-dark: #2d161d;
            --text-muted: #826a71;
            --accent-green-bg: #f0f9f4;
            --accent-green-text: #2f7a4d;
            --accent-blue-bg: #eef4fc;
            --accent-blue-text: #2b6cb0;
            --border-color: #f3e8e9;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', system-ui, sans-serif; }
        body { background-color: var(--bg-main); color: var(--text-dark); display: flex; height: 100vh; overflow: hidden; }

        .sidebar { width: 250px; background-color: var(--sidebar-bg); color: var(--sidebar-text); padding: 24px 16px; display: flex; flex-direction: column; justify-content: space-between; }
        .logo-section { display: flex; align-items: center; gap: 12px; margin-bottom: 32px; padding-left: 8px; }
        .logo-box { background: rgba(255,255,255,0.15); padding: 8px; border-radius: 8px; font-size: 20px; color: #fff; display: flex; }
        .logo-text h1 { font-size: 16px; color: #fff; font-weight: 700; line-height: 1.2; }
        .logo-text span { font-size: 10px; text-transform: uppercase; letter-spacing: 1px; color: var(--sidebar-text); opacity: 0.7; }
        
        .menu-group { margin-bottom: 24px; }
        .menu-label { font-size: 10px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; padding-left: 12px; opacity: 0.5; font-weight: 700; }
        .menu-item { display: flex; align-items: center; gap: 12px; padding: 10px 12px; border-radius: 8px; color: var(--sidebar-text); text-decoration: none; font-size: 13px; font-weight: 500; margin-bottom: 4px; transition: 0.2s; }
        .menu-item:hover { background: rgba(255,255,255,0.05); color: #fff; }
        .menu-item.active { background-color: var(--sidebar-active); color: #fff; font-weight: 600; }

        .main-content { flex: 1; display: flex; flex-direction: column; overflow-y: auto; padding: 24px 32px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
        .breadcrumbs { font-size: 18px; font-weight: 700; }
        .breadcrumbs span { color: var(--text-muted); font-size: 13px; font-weight: 400; }

        .stats-grid { display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 20px; margin-bottom: 24px; }
        .stat-card { background: var(--panel-bg); border-radius: 16px; padding: 20px; border: 1px solid var(--border-color); }
        .stat-card.hero { background: var(--sidebar-bg); color: #fff; }
        .stat-icon { font-size: 20px; margin-bottom: 12px; color: var(--text-muted); display: inline-flex; padding: 8px; background: var(--bg-main); border-radius: 10px; }
        .stat-card.hero .stat-icon { background: rgba(255,255,255,0.1); color: #fff; }
        .stat-label { font-size: 11px; text-transform: uppercase; color: var(--text-muted); font-weight: 600; }
        .stat-card.hero .stat-label { color: var(--sidebar-text); opacity: 0.8; }
        .stat-num { font-size: 26px; font-weight: 700; }

        .panel { background: var(--panel-bg); border-radius: 16px; padding: 24px; border: 1px solid var(--border-color); margin-bottom: 20px; }
        .panel-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid var(--border-color); padding-bottom: 12px; }
        .panel-title { font-size: 15px; font-weight: 700; display: flex; align-items: center; gap: 8px; color: var(--sidebar-bg); }

        .btn { padding: 8px 14px; border-radius: 8px; font-size: 12px; font-weight: 600; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; transition: 0.2s; text-decoration: none; }
        .btn-primary { background: var(--sidebar-bg); color: #fff; }
        .btn-primary:hover { background: var(--sidebar-active); }
        .btn-secondary { background: var(--bg-main); color: var(--text-dark); border: 1px solid var(--border-color); }

        .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group.full-width { grid-column: span 2; }
        .form-group label { font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--text-muted); }
        .form-group code { font-size: 10px; color: var(--sidebar-bg); font-weight: bold; }
        .form-control { padding: 10px 14px; border: 1px solid var(--border-color); background: var(--bg-main); border-radius: 8px; font-size: 13px; color: var(--text-dark); outline: none; }

        .custom-table { width: 100%; border-collapse: collapse; }
        .custom-table th { text-align: left; font-size: 11px; text-transform: uppercase; color: var(--text-muted); padding: 12px; border-bottom: 2px solid var(--border-color); }
        .custom-table td { padding: 14px 12px; font-size: 13px; border-bottom: 1px solid var(--border-color); }
        .badge { padding: 4px 8px; border-radius: 6px; font-size: 10px; font-weight: 700; text-transform: uppercase; display: inline-block; }
        .badge.available { background: var(--accent-green-bg); color: var(--accent-green-text); }
        .badge.rented { background: var(--accent-blue-bg); color: var(--accent-blue-text); }
        .schema-tag { font-family: monospace; background: var(--bg-main); padding: 2px 6px; border-radius: 4px; font-size: 11px; font-weight: 600; border: 1px solid var(--border-color); }
    </style>
</head>
<body>

    <div class="sidebar">
        <div>
            <div class="logo-section">
                <div class="logo-box"><i class="ti ti-database-schema"></i></div>
                <div class="logo-text">
                    <h1>DreamHome</h1>
                    <span>Schema Engine M1</span>
                </div>
            </div>
            <div class="menu-group">
                <div class="menu-label">Overview</div>
                <a href="?tab=overview" class="menu-item {{ $currentTab == 'overview' ? 'active' : '' }}"><i class="ti ti-dashboard"></i> Dashboard</a>
            </div>
            <div class="menu-group">
                <div class="menu-label">Module Tables</div>
                <a href="?tab=properties" class="menu-item {{ $currentTab == 'properties' || $currentTab == 'property-form' ? 'active' : '' }}"><i class="ti ti-building"></i> Property Records</a>
                <a href="?tab=owners" class="menu-item {{ $currentTab == 'owners' || $currentTab == 'owner-form' ? 'active' : '' }}"><i class="ti ti-users-group"></i> Owner Records</a>
            </div>
        </div>
        <div class="user-profile">
            <div class="avatar">ERD</div>
            <div class="user-info" style="color: #fff; font-size: 13px;">
                <h4>M1 Structure</h4>
                <p style="font-size: 11px; opacity: 0.7;">Owner & Property Mapping</p>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="breadcrumbs">Module 1 Schema Workspace <span>&gt; Table Manager</span></div>
        </div>

        <div class="stats-grid">
            <div class="stat-card hero">
                <div class="stat-icon"><i class="ti ti-building"></i></div>
                <div class="stat-label">Properties Total</div>
                <div class="stat-num">{{ $totalProperties }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="ti ti-id-badge"></i></div>
                <div class="stat-label">Owners Total</div>
                <div class="stat-num">{{ $totalOwners }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="ti ti-key-visual"></i></div>
                <div class="stat-label">Active Rentals</div>
                <div class="stat-num">{{ $activeRentals }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="ti ti-chart-pie"></i></div>
                <div class="stat-label">Occupancy</div>
                <div class="stat-num" style="color: var(--accent-green-text);">{{ $occupancyRate }}%</div>
            </div>
        </div>

        @if($currentTab == 'overview')
        <div class="panel">
            <div class="panel-header">
                <div class="panel-title"><i class="ti ti-zoom-check"></i> Active Entity Structural Check</div>
            </div>
            <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6; margin-bottom: 16px;">
                Your system is successfully aligned with your physical ERD layout parameters. You can inspect the Property entity indices or input registration configurations below.
            </p>
            <div class="panel-actions">
                <a href="?tab=properties" class="btn btn-primary">Open Property Rows</a>
                <a href="?tab=owners" class="btn btn-secondary">Open Owner Rows</a>
            </div>
        </div>
        @endif

        @if($currentTab == 'properties')
        <div class="panel">
            <div class="panel-header">
                <div class="panel-title"><i class="ti ti-table-alias"></i> Property Table Row Records</div>
                <a href="?tab=property-form" class="btn btn-primary"><i class="ti ti-plus"></i> Add Property Entry</a>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>property_id (PK)</th>
                        <th>Address Details (street, area, city, postcode)</th>
                        <th>type</th>
                        <th>rent</th>
                        <th>status</th>
                        <th>owner_id (FK)</th>
                        <th>branch_no (FK)</th>
                        <th>staff_id (FK)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $prop)
                    <tr>
                        <td class="schema-tag" style="color: var(--sidebar-bg); font-weight:700;">{{ $prop['property_id'] }}</td>
                        <td>
                            <strong>{{ $prop['street'] }}</strong>, {{ $prop['area'] }}, {{ $prop['city'] }} <span style="color:var(--text-muted); font-family:monospace;">{{ $prop['postcode'] }}</span>
                            <br><small style="color: var(--text-muted);">Owner Assignment: {{ $prop['owner_name'] }}</small>
                        </td>
                        <td>{{ $prop['type'] }}</td>
                        <td style="font-weight: 600;">£{{ number_format($prop['rent']) }}</td>
                        <td><span class="badge {{ strtolower($prop['status']) }}">{{ $prop['status'] }}</span></td>
                        <td class="schema-tag">{{ $prop['owner_id'] }}</td>
                        <td class="schema-tag">{{ $prop['branch_no'] }}</td>
                        <td class="schema-tag">{{ $prop['staff_id'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        @if($currentTab == 'property-form')
        <div class="panel">
            <div class="panel-header">
                <div class="panel-title"><i class="ti ti-edit-box"></i> Register Property Row Form</div>
                <a href="?tab=properties" class="btn btn-secondary"><i class="ti ti-arrow-back-up"></i> Return</a>
            </div>
            <form class="form-grid" onsubmit="event.preventDefault();">
                <div class="form-group">
                    <label>property_id <code>[Primary Key]</code></label>
                    <input type="text" class="form-control" placeholder="e.g., PA14" required>
                </div>
                <div class="form-group">
                    <label>type</label>
                    <input type="text" class="form-control" placeholder="e.g., Flat, House" required>
                </div>
                <div class="form-group">
                    <label>street</label>
                    <input type="text" class="form-control" placeholder="e.g., 2 Manor Road" required>
                </div>
                <div class="form-group">
                    <label>area</label>
                    <input type="text" class="form-control" placeholder="e.g., Hyndland" required>
                </div>
                <div class="form-group">
                    <label>city</label>
                    <input type="text" class="form-control" placeholder="e.g., Glasgow" required>
                </div>
                <div class="form-group">
                    <label>postcode</label>
                    <input type="text" class="form-control" placeholder="e.g., G12 8QQ" required>
                </div>
                <div class="form-group">
                    <label>rent</label>
                    <input type="number" class="form-control" placeholder="e.g., 650" required>
                </div>
                <div class="form-group">
                    <label>status</label>
                    <select class="form-control">
                        <option>Available</option>
                        <option>Rented</option>
                        <option>Reserved</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>owner_id <code>[Foreign Key → Owner]</code></label>
                    <input type="text" class="form-control" placeholder="e.g., CO45" required>
                </div>
                <div class="form-group">
                    <label>branch_no <code>[Foreign Key → Branch]</code></label>
                    <input type="text" class="form-control" placeholder="e.g., B001" required>
                </div>
                <div class="form-group full-width">
                    <label>staff_id <code>[Foreign Key → Staff]</code></label>
                    <input type="text" class="form-control" placeholder="e.g., ST007" required>
                </div>
                <div class="form-group full-width" style="margin-top: 12px;">
                    <button type="submit" class="btn btn-primary" style="width: 120px; justify-content: center;">Save Entry</button>
                </div>
            </form>
        </div>
        @endif

        @if($currentTab == 'owners')
        <div class="panel">
            <div class="panel-header">
                <div class="panel-title"><i class="ti ti-table-alias"></i> Owner Table Row Records</div>
                <a href="?tab=owner-form" class="btn btn-primary"><i class="ti ti-plus"></i> Add Owner Entry</a>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>owner_id (PK)</th>
                        <th>firt_name</th>
                        <th>last_name</th>
                        <th>address</th>
                        <th>phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($owners as $owner)
                    <tr>
                        <td class="schema-tag" style="color: var(--sidebar-bg); font-weight:700;">{{ $owner['owner_id'] }}</td>
                        <td><strong>{{ $owner['firt_name'] }}</strong></td>
                        <td><strong>{{ $owner['last_name'] }}</strong></td>
                        <td>{{ $owner['address'] }}</td>
                        <td style="font-family: monospace;">{{ $owner['phone'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        @if($currentTab == 'owner-form')
        <div class="panel">
            <div class="panel-header">
                <div class="panel-title"><i class="ti ti-edit-box"></i> Register Owner Row Form</div>
                <a href="?tab=owners" class="btn btn-secondary"><i class="ti ti-arrow-back-up"></i> Return</a>
            </div>
            <form class="form-grid" onsubmit="event.preventDefault();">
                <div class="form-group">
                    <label>owner_id <code>[Primary Key]</code></label>
                    <input type="text" class="form-control" placeholder="e.g., CO45" required>
                </div>
                <div class="form-group">
                    <label>firt_name</label>
                    <input type="text" class="form-control" placeholder="e.g., Tina" required>
                </div>
                <div class="form-group">
                    <label>last_name</label>
                    <input type="text" class="form-control" placeholder="e.g., Murphy" required>
                </div>
                <div class="form-group">
                    <label>phone</label>
                    <input type="text" class="form-control" placeholder="e.g., 0141-943-1728" required>
                </div>
                <div class="form-group full-width">
                    <label>address</label>
                    <input type="text" class="form-control" placeholder="e.g., 12 Park Pl, Glasgow" required>
                </div>
                <div class="form-group full-width" style="margin-top: 12px;">
                    <button type="submit" class="btn btn-primary" style="width: 120px; justify-content: center;">Save Entry</button>
                </div>
            </form>
        </div>
        @endif

    </div>

</body>
</html>