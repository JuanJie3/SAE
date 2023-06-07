def test(m):

    i = 0
    t = ['UAA', 'UAG', 'UGA']
    stop = 'codon stop'
    print(t[0])
    while i < len(t) :
        if t[i] == m :
            return stop
        i += 1   

test('UAA')