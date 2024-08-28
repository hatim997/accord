-- Auto Liability =  1
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (1, 'COMBINED SINGLE LIMIT (EA accident)', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (1, 'BODILY INJURY (Per person)', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (1, 'BODILY INJURY (Per accident)', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (1, 'PROPERTY DAMAGE (Per accident)', 'text');

-- General Liability =  2
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (2, 'EACH OCCURRENCE', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (2, 'DAMAGE TO RENTED PREMISES (EA Occurence)', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (2, 'MED EXP (Any one person)', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (2, 'PERSONAL & ADV INJURY', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (2, 'GENERAL AGGREGATE', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (2, 'PRODUCTS - COMP/OP AGG', 'text');

-- Cargo =  3
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (3, 'LIMIT PER VEHICLE', 'text');

-- Trailer Interchange =  4
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (4, 'LIMIT PER TRAILER', 'text');

-- Employers Liability =  5
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (5, 'WC STATUTORY LIMITS', 'check');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (5, 'OTHER', 'check');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (5, 'E.L. EACH ACCIDENT', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (5, 'E.L. DISEASE - EA EMPLOYEE', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (5, 'E.L. DISEASE - POLICY LIMIT', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (5, 'Unlimited Employers Liability Limits', 'check');

-- Contingent Cargo	= 6
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (6, 'Ded', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (6, 'Limit', 'check');

-- Ref. Trailer =  7
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (7, 'Ded', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (7, 'Limit', 'text');

-- Employee Dishonesty =  8
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (8, 'Ded', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (8, 'Limit', 'text');

-- Umbrella =  9
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (9, 'EACH OCCURRENCE', 'text');
INSERT INTO policy_limits (`policy_type_id`, `coverage_item`, `nature_of_input`) values (9, 'AGGREGATE', 'text');



