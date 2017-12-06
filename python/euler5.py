import itertools

isDivisible = True
j = 2520

while (True):
    for i in range(2,21):
        if j % i == 0:
            isDivisible = True
            ++j
        else:
            isDivisible = False
            ++j
            break

    if isDivisible == True:
        print(j)
    break