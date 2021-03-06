<?php

return  [
  'apiConsumers' => [
    'vpn-user-portal' => 'abcdef',
    'vpn-admin-portal' => 'fedcba',
    'vpn-server-node' => 'aabbcc',
  ],
  'CA' => [
    'key_size' => 4096,
    'ca_expire' => 1826,
    'cert_expire' => 365,
    'ca_cn' => 'VPN CA',
  ],
  'instanceNumber' => 1,
  'vpnProfiles' => [
    'internet' => [
      'profileNumber' => 1,
      'displayName' => 'Internet Access',
      'extIf' => 'eth0',
      'range' => '10.0.0.0/24',
      'range6' => 'fd00:4242:4242::/48',
      'hostName' => 'vpn.example',
    ],
    'acl' => [
      'profileNumber' => 1,
      'displayName' => 'Internet Access',
      'extIf' => 'eth0',
      'range' => '10.0.0.0/24',
      'range6' => 'fd00:4242:4242::/48',
      'hostName' => 'vpn.example',
      'enableAcl' => true,
      'aclGroupList' => [
        'students',
      ],
    ],
    'acl2' => [
      'profileNumber' => 1,
      'displayName' => 'Internet Access',
      'extIf' => 'eth0',
      'range' => '10.0.0.0/24',
      'range6' => 'fd00:4242:4242::/48',
      'hostName' => 'vpn.example',
      'enableAcl' => true,
      'aclGroupList' => [
        'employees',
      ],
    ],
  ],
  'groupProviders' => [
    'StaticProvider' => [
      'all' => [
        'displayName' => 'All',
        'members' => [
          'foo',
          'bar',
        ],
      ],
      'students' => [
        'displayName' => 'Students',
        'members' => [
          'foo',
        ],
      ],
      'employees' => [
        'displayName' => 'Employees',
        'members' => [
          'bar',
        ],
      ],
    ],
  ],
];
