<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <style>
        /* HTMLtable.com */
        .divTable {
            display: table;
            border-collapse: separate;
            border-spacing: 0;
        }

        .divTableRow {
            display: table-row;
        }

        .divTableHeading {
            display: table-header-group;
        }

        .divTableCell,
        .divTableHead {
            display: table-cell;
            border: 1px solid #000;
            font-size: 12px;
            /* Adjust font size */
            padding: 5px;
            /* Adjust padding */
            line-height: 1.4;
            /* Adjust line height */
            letter-spacing: 0.5px;
            /* Adjust letter spacing */
        }

        .divTableHeading {
            display: table-header-group;
        }

        .divTableFoot {
            display: table-footer-group;
        }

        .divTableBody {
            display: table-row-group;
        }

        .checkboxes {
            display: flex;
            justify-content: center;
            align-items: center;
            vertical-align: middle;
            word-wrap: break-word;
        }
    </style>
</head>

<body>

    <table class="divTable">
        <tbody class="divTableBody">
            <tr class="divTableRow">
                <td class="divTableCell" style=" text-align: center;">
                    THIS CERTIFICATE IS ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS NO RIGHTS UPON THE
                    CERTIFICATE HOLDER. THIS CERTIFICATE DOES NOT AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER THE
                    COVERAGE AFFORDED BY THE POLICIES BELOW. THIS CERTIFICATE OF INSURANCE DOES NOT CONSTITUTE A
                    CONTRACT BETWEEN THE ISSUING INSURER(S), AUTHORIZED REPRESENTATIVE OR PRODUCER, AND THE CERTIFICATE
                    HOLDER.
                </td>
            </tr>

            <tr class="divTableRow">
                <td class="divTableCell" style=" text-align: center;">
                    IMPORTANT: If the certificate holder is an ADDITIONAL INSURED, the policy(ies) must be endorsed. If
                    SUBROGATION IS WAIVED, subject to the terms and conditions of the policy, certain policies may
                    require an endorsement. A statement on this certificate does not confer rights to the certificate
                    holder in lieu of such endorsement(s).
                </td>
            </tr>

            <tr class="divTableRow">
                <td class="divTableCell">
                    <table class="divTable">
                        <tbody class="divTableBody">
                            <tr class="divTableRow">
                                <td class="divTableCell">
                                    PRODUCER
                                </td>
                                <td class="divTableCell">
                                    <table class="divTable">
                                        <tbody class="divTableBody">
                                            <tr class="divTableRow">
                                                <td class="divTableCell">
                                                    Contact
                                                </td>
                                            </tr>
                                            <tr class="divTableRow">
                                                <td class="divTableCell">
                                                    Phone
                                                </td>
                                                <td class="divTableCell">
                                                    Fax
                                                </td>
                                            </tr>
                                            <tr class="divTableRow">
                                                <td class="divTableCell">
                                                    Email
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="divTableRow">
                                <td class="divTableCell">
                                    INSURED
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr class="divTableRow">
                <table class="divTable">
                    <tbody class="divTableBody">
                        @foreach ($policytypes->whereNotIn('id', [5, 6, 7, 8, 9]) as $pt)
                            <tr class="divTableRow">
                                <td class="divTableCell">
                                    <table class="divTable">
                                        <tbody class="divTableBody">
                                            <tr class="divTableRow">
                                                <td class="">{{ $pt->type_name }}</td>
                                            </tr>
                                            <tr class="divTableRow">
                                                <td class="">
                                                    @foreach ($pt->policies as $policy)
                                                        @if (   $policy->id == 1 ||
                                                                $policy->id == 2 ||
                                                                $policy->id == 3 ||
                                                                $policy->id == 4 ||
                                                                $policy->id == 5 ||
                                                                $policy->id == 6 ||
                                                                $policy->id == 8 ||
                                                                $policy->id == 9 ||
                                                                $policy->id == 14 ||
                                                                $policy->id == 15 ||
                                                                $policy->id == 16 ||
                                                                $policy->id == 17 ||
                                                                $policy->id == 18 ||
                                                                $policy->id == 19)
                                                            <input type="checkbox"
                                                                {{ $certPolicy->where('policy_id', $policy->id)->first() ? 'checked' : '' }} />{{ $policy->policy_title }}
                                                        @elseif ($policy->whereNotIn('id', [1, 2, 3, 4, 5, 6, 8, 9, 14, 15, 16, 17, 18, 19]))
                                                            <label for="checkbox1" class="checkboxes">
                                                                <input type="checkbox"
                                                                    {{ $certPolicy->where('policy_id', $policy->id)->first() ? 'checked' : '' }} />{{ $policy->policy_title }}
                                                            </label>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="divTableCell">SD</td>
                                <td class="divTableCell">ED</td>
                                <td class="divTableCell">POLICY NUMBER</td>
                                <td class="divTableCell">POLICY EEF</td>
                                <td class="divTableCell">POLICY EXP</td>
                                <td class="divTableCell">
                                    @foreach ($pt->policyLimits as $limit)
                                        <span>
                                            {{ $limit->coverage_item }} &nbsp;
                                            <span style="background: #d8d6d6">{{ $certPolimit->where('policy_limit_id', $limit->id)->first() ? $certPolimit->where('policy_limit_id', $limit->id)->first()->amount ?? 0 : 0 }}</span>
                                        </span>
                                        <br />
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </tr>
        </tbody>
    </table>
</body>

</html>
