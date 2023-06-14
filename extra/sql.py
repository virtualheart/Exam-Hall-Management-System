input_file = 'input.txt'
sql_statements = []

with open(input_file, 'r') as file:
    line_count = 0
    part = ""
    papercode = ""
    papername = ""

    for line in file:
        line = line.strip()

        # Ignore the line if it exactly matches "Examinations, MAY - 2023"
        if "2023" in line or "SEMESTER" in line or line == "AN" or line == "FN" or not line:
            # print(line)
            continue

        line_count += 1

        if line_count == 1:
            part = line
        elif line_count == 2:
            papercode = line
        elif line_count == 3:
            papername = line
            line_count = 0

            # Ignore the line if it matches any of the specified conditions
            # if part == "2023" or part == "SEMESTER" or part == "AN" or part == "FN":
                # continue

            sql_statement = f"INSERT INTO tbl_subject (part, paper_code, subjectname) VALUES ('{part}', '{papercode}', '{papername}');"
            sql_statements.append(sql_statement)

# Print SQL statements
for statement in sql_statements:
    print(statement)
    # continue
