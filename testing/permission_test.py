import unittest
import os

class TestPermissions(unittest.TestCase):
    def test_read(self):
        self.assertTrue(os.access('../Reviews', os.R_OK))
        self.assertTrue(os.access('../Reviews/Output', os.R_OK))

    def test_write(self):
        self.assertTrue(os.access('../Reviews/Output', os.W_OK))
        # self.assertFalse(os.access('../Reviews/Output', os.W_OK))

if __name__ == '__main__':
    unittest.main()