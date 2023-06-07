#import sys
#sys.path.append(C:\Users\PC\Desktop\tp\SAE\bio.py)

from biology import *

def test_est_base():
    assert est_base('A')
    assert not est_base('z')
    assert est_base('T')
    assert not est_base('f')
    print('test ok ')



def test_adn_base():
    assert not adn_base('AGDYGYD')
    assert not adn_base('FFZNFZD')
    assert not adn_base("ATGDE")
    assert adn_base('ATGC')
    assert adn_base('ATGCATCGG')
    print('test ok')


def test_arn():
    assert not arn('AEZTGC') 
    assert not arn('ATEUUFD')
    assert not arn('BJFBUBZF')
    assert arn('ATGC') == 'AUGC'
    assert arn('AAATTGGGCCC') == "AAAUUGGGCCC"
    assert arn('TTTTT') == "UUUUU"
    print("test ok")


def test_arn_to_codon():
    assert arn_to_codons('ATGCATGCATGC') == ['ATG', 'CAT', 'GCA', 'TGC']
    assert arn_to_codons("ATGAGTAG") == ['ATG', 'AGT']
    assert arn_to_codons('ATGATGATG') == ['ATG', 'ATG', 'ATG']
    assert arn_to_codons('ATGATGAT') == ['ATG', 'ATG']
    print('test ok')


def test_codons_stop():
    assert codons_stop(dico) == ['UAA', 'UAG', 'UGA']
    print('test ok ')



def test_codon_to_aa():
    assert codon_to_aa(codons222, dico) == ['Lysine']
    print('test ok ')
