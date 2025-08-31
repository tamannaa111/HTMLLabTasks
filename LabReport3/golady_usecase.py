"""Module to generate GoLady use case diagram using Graphviz."""

from graphviz import Digraph

g = Digraph('GoLadyUseCase', filename='golady_usecase', format='svg')
g.attr(rankdir='LR', fontname='Helvetica')

# Actors
g.attr('node', shape='plaintext')
g.node('Rider',     '< <b>Rider (Woman)</b> >')
g.node('Driver',    '< <b>Driver (Woman)</b> >')
g.node('Admin',     '< <b>Admin</b> >')
g.node('PG',        '< <b>Payment Gateway</b> >')
g.node('MAP',       '< <b>Maps / Geocoding</b> >')
g.node('NOTI',      '< <b>SMS / Email</b> >')
g.node('OAUTH',     '< <b>Social Auth</b> >')

# System boundary (cluster)
with g.subgraph(name='cluster_system') as s:
    s.attr(label='GoLady System', style='rounded', color='#cbd5e1', bgcolor='#f8fafc')
    s.attr('node', shape='ellipse', style='solid', color='#0f172a')

    s.node('UC1',  'Register / Login')
    s.node('UC2',  'Manage Profile')
    s.node('UC3',  'Verify Driver Documents')
    s.node('UC4',  'Request Ride')
    s.node('UC5',  'Women-Driver-Only')
    s.node('UC6',  'Get Fare Estimate')
    s.node('UC7',  'Match Rider & Driver')
    s.node('UC8',  'Accept / Reject Ride')
    s.node('UC9',  'Navigate to Pickup/Drop-off')
    s.node('UC10', 'Live Trip Tracking')
    s.node('UC11', 'Start / End Trip')
    s.node('UC12', 'Payments')
    s.node('UC13', 'Rate & Review')
    s.node('UC14', 'SOS / Incident Report')
    s.node('UC15', 'Notifications')
    s.node('UC16', 'Trip History')
    s.node('UC17', 'User Management')
    s.node('UC18', 'Dispute Resolution')
    s.node('UC19', 'Analytics Dashboard')

# Associations (actors -> use cases)
edges = [
    ('Rider','UC1'),('Rider','UC2'),('Rider','UC4'),('Rider','UC6'),('Rider','UC10'),
    ('Rider','UC11'),('Rider','UC12'),('Rider','UC13'),('Rider','UC14'),('Rider','UC15'),('Rider','UC16'),
    ('Driver','UC1'),('Driver','UC2'),('Driver','UC3'),('Driver','UC7'),('Driver','UC8'),
    ('Driver','UC9'),('Driver','UC11'),('Driver','UC15'),('Driver','UC16'),
    ('Admin','UC17'),('Admin','UC18'),('Admin','UC19'),('Admin','UC3')
]
for a,b in edges:
    g.edge(a,b)

# Include / Extend (dashed)
def dashed(a,b,label):
    g.edge(a,b, style='dashed', label=label, fontcolor='#64748b')

dashed('UC4','UC5','«include»')
dashed('UC4','UC6','«include»')
dashed('UC4','UC7','«include»')
dashed('UC11','UC10','«include»')
dashed('UC11','UC16','«include»')
dashed('UC12','UC16','«extend»')
dashed('UC14','UC15','«extend»')
dashed('UC8','UC15','«extend»')

# External interactions
g.edge('UC1','OAUTH')
g.edge('UC4','MAP')
g.edge('UC6','MAP')
g.edge('UC9','MAP')
g.edge('UC12','PG')
g.edge('UC15','NOTI')

g.render(cleanup=True)
print('Generated golady_usecase.svg')
